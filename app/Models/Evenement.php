<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $table = 'evenements';

    protected $fillable = [
        'titre_fr',
        'titre_ar', // Added
        'type_fr',
        'type_ar', // Added
        'date_debut',
        'date_fin',
        'status',
        'image',
        'video',
        'gallery',
        'description_fr',
        'description_ar',
        'links',
    ];
    protected $casts = [
        'links' => 'array',
        'gallery' => 'array',
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
}
