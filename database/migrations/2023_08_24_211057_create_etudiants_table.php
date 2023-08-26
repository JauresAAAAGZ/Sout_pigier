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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('Matricule');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Niveau_Etude');
            $table->date('Date_Naissance');
            $table->string('Lieu_Naissance');
            $table->unsignedBigInteger('filiere_id')->nullable();
            $table->foreign('filiere_id')->references('id')->on('filieres');
            $table->unsignedBigInteger('memoire_id')->nullable();
            $table->foreign('memoire_id')->references('id')->on('memoires');
            $table->unsignedBigInteger('professeur_id')->nullable();
            $table->foreign('professeur_id')->references('id')->on('professeurs');
            $table->unsignedBigInteger('jury_id')->nullable();
            $table->foreign('jury_id')->references('id')->on('jurys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
