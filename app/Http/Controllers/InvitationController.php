<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Invitation;

class InvitationController extends Controller
{
    public function inviteUser(Request $request)
    {
        $token = random_int(100000, 999999);

        $email = $request->email;
        $colocName = "ColocManager";

        Invitation::create([
            'email' => $email,
            'token' => $token,
            'colocation_id' => $request->colocation_id
        ]);

        Mail::to($email)->send(new InvitationMail($token, 'ColocManager'));

        return back()->with('success', 'Code d-invitation tsift!');
    }
}
