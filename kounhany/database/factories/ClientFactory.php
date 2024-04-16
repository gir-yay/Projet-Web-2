<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name,
            'prenom' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'password_' => '$2y$10$vBhHw1FWhsd5LGk8.zEz1usPjzh3PB9.3SggjQvlZ6Pgs.tQ.ANKK',
            'phone' => fake()->phoneNumber,
            'adresse' => fake()->address,
            'compte_status' => 'active',
        ];
    }
}
