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
        Schema::create('jurys_professeur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurys_id')->nullable();
            $table->foreign('jurys_id')->references('id')->on('jurys')->onDelete('cascade');

            $table->unsignedBigInteger('professeur_id')->nullable();
            $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jury_professeur');
    }
};
