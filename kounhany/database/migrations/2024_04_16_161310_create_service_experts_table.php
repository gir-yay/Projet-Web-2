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
        Schema::create('service_experts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_id')->constrained('experts');
            $table->foreignId('service_id')->constrained('services');
            $table->integer('nbr_annee_d_exp')->nullable();
            $table->text('disponibilite')->nullable();
            $table->string('duree', 100)->nullable();
            $table->float('prix_par_duree')->nullable();
            $table->string('ville', 100);
            $table->string('status_', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_experts');
    }
};
