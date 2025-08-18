<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdhesionFormation>
 */
class AdhesionFormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createdAt = Carbon::now()->subDays(rand(0, 6))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        return [
            'nom' => $this->faker->word(), // Generates a random word (e.g., "Ali")
            'prenom' => $this->faker->firstName(), // Generates a random first name
            'genre' => $this->faker->randomElement(['Masculin', 'Féminin']), // Random gender (Masculine or Feminine)
            'tele' => $this->faker->phoneNumber(), // Generates a random phone number
            'region' => $this->faker->state(), // Generates a random state/region
            'ville' => $this->faker->city(), // Generates a random city
            'formation' => $this->faker->text(),
            'reseaux_sociaux' => $this->faker->text(),
            'autre' => $this->faker->text(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
