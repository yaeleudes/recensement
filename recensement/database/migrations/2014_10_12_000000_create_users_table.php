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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('numero')->unique();
            $table->string('autre_numero')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('pays');
            $table->string('ville');
            $table->enum('sexe', ['Masculin', 'Feminin', 'Autre'])->default('Masculin');
            $table->string('parrain');
            $table->enum('electeur', ['Oui', 'Non'])->default('Oui');
            $table->enum('pdci-rda', ['Oui', 'Non'])->default('Oui');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
