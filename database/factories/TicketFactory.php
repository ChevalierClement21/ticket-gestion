<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Categorie;
use App\Models\Priorite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'priorite_id' => Priorite::factory(),
            'status' => 'Ouvert', // Par défaut, le statut est "Open"
            'user_id' => User::factory(), // Associe un utilisateur
            'categorie_id' => Categorie::factory(), // Associe une catégorie
        ];
    }
}
