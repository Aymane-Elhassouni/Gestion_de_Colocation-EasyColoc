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
        Schema::create('add_payees', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant_a_payee');
            $table->string('status');
            $table->foreignId('depense_id')->constrained('depenses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_payees');
    }
};
