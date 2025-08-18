<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvenementFactory extends Factory
{
    public function definition()
    {
        $createdAt = Carbon::now()->subDays(rand(0, 6))->setTime(rand(0, 23), rand(0, 59), rand(0, 59)); // Random time as well

        return [
            'titre_fr' => $this->faker->sentence(3),
            'titre_ar' => $this->faker->sentence(3),
            'type_fr' => $this->faker->randomElement(['Conference', 'Workshop', 'Seminar', 'Meetup']),
            'type_ar' => $this->faker->randomElement(['Conference', 'Workshop', 'Seminar', 'Meetup']),
            'date_debut' => Carbon::now()->subDays(rand(0, 6))->format('Y-m-d'),
            'date_fin' => Carbon::now()->subDays(rand(0, 6))->addDays(rand(1, 3))->format('Y-m-d'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'image' => $this->faker->imageUrl(640, 480, 'events', true, 'Faker'),
            'gallery' => [$this->faker->imageUrl(), $this->faker->imageUrl()],
            'video' => $this->faker->url(),
            'description_ar' => $this->faker->paragraph(3),
            'description_fr' => $this->faker->paragraph(3),
            'links' => [$this->faker->url(), $this->faker->url()],
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}

