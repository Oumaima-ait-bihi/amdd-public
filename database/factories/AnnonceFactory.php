<?php

namespace Database\Factories;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AnnonceFactory extends Factory
{
    protected $model = Annonce::class;

    public function definition()
    {
        $createdAt = Carbon::now()->subDays(rand(0, 6))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        return [
            'titre_annonce_ar' => $this->faker->sentence(3, 'ar'),
            'titre_annonce_fr' => $this->faker->sentence(3, 'fr'),
            'date_annonce' => $this->faker->date(),
            'description_annonce_ar' => $this->faker->paragraph(3, 'ar'),
            'description_annonce_fr' => $this->faker->paragraph(3, 'fr'),
            'image_annonce' => $this->faker->imageUrl(640, 480, 'annonces', true),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}

