<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdhesionFormation extends Model
{
    use HasFactory;
    protected $table = 'adhesion_formation';
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'tele',
        'region',
        'ville',
        'formation',
        'reseaux_sociaux',
        'autre',
    ];
}
