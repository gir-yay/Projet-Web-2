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
        Schema::create('commentaires_sur_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('note');
            $table->foreignId('demande_id')->constrained('demandes_clients');
            $table->string('commentaire', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires_sur_clients');
    }
};