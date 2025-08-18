<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adhesion>
 */
class AdhesionFactory extends Factory
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
            'tele' => preg_replace('/[^0-9]/', '', $this->faker->phoneNumber()), // Generates a random phone number
            'region' => $this->faker->state(), // Generates a random state/region
            'ville' => $this->faker->city(), // Generates a random city
            'profession' => $this->faker->jobTitle(), // Generates a random job title (e.g., "Software Engineer")
            'specialite' => $this->faker->word(), // Generates a random specialty (e.g., "Marketing")
            'annee_exp' => $this->faker->numberBetween(1, 40), // Generates a random number for years of experience (1-40)
            'niveau_etude' => $this->faker->randomElement(['Baccalauréat', 'Licence', 'Master', 'Doctorat']), // Generates random education level
            'tech_level' => $this->faker->randomElement(['Débutant', 'Intermédiaire', 'Avancé', 'Expert']), // Random tech skill level
            'goal_association' => $this->faker->sentence(6), // Generates a random sentence (e.g., "Improve education in local communities")
            'activite_option' => $this->faker->word(), // Random activity option (e.g., "Volunteer")
            'autreAct' => $this->faker->sentence(4), // Random sentence describing other activities (e.g., "Web development for NGOs")
            'competence_option' => $this->faker->randomElement(['Leadership', 'Communication', 'Teamwork', 'Problem-solving']), // Random skill option
            'courses' => $this->faker->randomElement(['Programming', 'Data Science', 'Business Management', 'Design']), // Random course name

            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
