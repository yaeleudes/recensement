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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->enum('sexe', ['Masculin', 'Feminin'])->default('Masculin');
            $table->string('numero')->unique();
            $table->string('autre_numero')->nullable();
            // $table->string('email')->nullable();
            $table->string('zone_rattachement');
            $table->string('zone_vote')->nullable();
            $table->string('parrain');
            $table->enum('electeur', ['Oui', 'Non'])->default('Oui');
            $table->enum('pdci_rda', ['Oui', 'Non'])->default('Oui');
            $table->string('ma_piece');
            $table->enum('archive', ['Oui', 'Non'])->default('Non');
            $table->foreign('zone_vote')->references('labelle')->on('departements');
            // $table->timestamp('email_verified_at')->nullable();
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
