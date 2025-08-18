<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdhesionStage extends Model
{
    use HasFactory;
    protected $table = 'adhesion_stage';
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'tele',
        'region',
        'ville',
        'age',
        'niveau_diplome',
        'type_diplome',
        'diplome_autre',
        'specialite',
        'type_stage',
        'dure_stage',
        'date_debut',
        'date_fin',
        'cv',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
