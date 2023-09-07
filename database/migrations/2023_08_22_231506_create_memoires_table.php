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
        Schema::create('memoires', function (Blueprint $table) {
            $table->id();
            $table->string('Theme');
            $table->integer('Nombre_Pages')->nullable();
            $table->date('Date_Depot')->format('d/m/Y');
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
        Schema::dropIfExists('memoires');
    }
};
