<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdhesionStage>
 */
class AdhesionStageFactory extends Factory
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
            'age' => $this->faker->numberBetween(18, 65),
            // Generates a random city
            'niveau_diplome' => $this->faker->text(),
            'type_diplome' => $this->faker->text(),
            'type_stage' => $this->faker->text(),
            'specialite' => $this->faker->text(),
            'dure_stage' => $this->faker->text(),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'cv' => $this->faker->text(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
