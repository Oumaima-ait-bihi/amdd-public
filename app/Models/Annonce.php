<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_annonce_ar',
        'titre_annonce_fr',
        'date_annonce',
        'description_annonce_ar',
        'description_annonce_fr',
        'image_annonce',
    ];

    protected $casts = [
        'date_annonce' => 'datetime',
    ];
}

