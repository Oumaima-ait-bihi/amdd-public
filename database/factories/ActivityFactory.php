<?php

namespace Database\Factories;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createdAt = Carbon::now()->subDays(rand(0, 6))->setTime(rand(0, 23), rand(0, 59), rand(0, 59)); // Random time as well

        return [
            'title' => $this->faker->sentence(3),
            'start_date' => Carbon::now()->subDays(rand(0, 6))->format('Y-m-d'),
            'end_date' => Carbon::now()->subDays(rand(0, 6))->addDays(rand(1, 3))->format('Y-m-d'),
            'location' => $this->faker->randomElement(['New York', 'London', 'Tokyo', 'Paris', 'Berlin', 'Sydney', 'Dubai', 'Los Angeles']),
            'image' => $this->faker->imageUrl(640, 480, 'events', true, 'Faker'),
            'description' => $this->faker->paragraph(3),
            'video' => $this->faker->url(),
            'link' => $this->faker->url(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
