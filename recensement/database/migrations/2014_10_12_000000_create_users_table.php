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
            $table->string('numero');
            $table->string('autre_numero');
            $table->string('email');
            $table->string('pays');
            $table->string('ville');
            $table->enum('sex', ['Masculin', 'Feminin', 'autre'])->default('Masculin');
            $table->string('parrain')->default('moi');
            $table->boolean('electeur')->default(true);
            $table->boolean('pdci-rda')->default(true);
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
