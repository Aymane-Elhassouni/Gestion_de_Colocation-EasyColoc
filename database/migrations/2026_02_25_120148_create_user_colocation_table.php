<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_colocation', function (Blueprint $table) {
            $table->id();
            $table->date('left_at');
            $table->string('role_colocation');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('colocation_id')->constrained('colocations');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_colocation');
    }
};
