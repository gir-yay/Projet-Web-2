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
        Schema::create('commentaires_sur_experts', function (Blueprint $table) {
            $table->id();
            $table->integer('note');
            $table->foreignId('demande_id')->constrained('demandes_clients');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('expert_id')->constrained('experts');
            $table->string('commentaire', 255);
            $table->boolean('afficher')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires_sur_experts');
    }
};
