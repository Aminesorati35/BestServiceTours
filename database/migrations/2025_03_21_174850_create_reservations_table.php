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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table users
            $table->foreignId('trajet_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table trajets
            $table->foreignId('voiture_id')->constrained()->onDelete('cascade');// Clé étrangère vers la table voiture
            $table->dateTime('date_reservation'); // Date de réservation
            $table->integer('nombre_personnes'); // Nombre de personnes pour la réservation
            $table->decimal('prix_total', 8, 2); // Prix total de la réservation
            $table->string('status')->default('pending'); // Statut de la réservation (en attente, confirmée, etc.)
            $table->enum('type_trajet', ['one_way', 'round_trip'])->default('one_way'); // New column
            $table->timestamps(); // Created_at et updated_at
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
