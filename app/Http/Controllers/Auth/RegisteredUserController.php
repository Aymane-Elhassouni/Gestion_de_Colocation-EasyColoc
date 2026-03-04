<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'invitation_code' => ['required'], // Zid l-vifirication dyal l-code hna
        ]);

        // 1. Vifiri wach l-code shih u dyal had l-email
        $invitation = \App\Models\Invitation::where('token', $request->invitation_code)
            ->where('email', $request->email)
            ->first();

        if (!$invitation) {
            return back()->withErrors(['invitation_code' => 'Le code d\'invitation est incorrect ou ne correspond pas à cet email.']);
        }

        $status = $request->boolean('status', true);

        // User li katsajel b invitation code dima Role 1 (User)
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $status,
            'role_id' => 1,
        ]);

        // 2. Linkih m3a d-dar f t-table pivot (user_colocation)
        $user->colocations()->attach($invitation->colocation_id, [
            'role_colocation' => 'membre' // Aw ay smiya bghiti t-3ti l-had l-user f d-dar
        ]);

        // 3. Mssah l-invitation bach ma-t-sta3melch mara khra
        $invitation->delete();

        event(new Registered($user));
        Auth::login($user);

        // Redirection directe l-dashboard s-shih
        if ($user->role_id == 2) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }
}
