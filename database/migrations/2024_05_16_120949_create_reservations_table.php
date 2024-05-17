<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hebergement');
            $table->unsignedBigInteger('id_heberge');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            $table->foreign('id_hebergement')->references('id')->on('hebergements');
            $table->foreign('id_heberge')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
