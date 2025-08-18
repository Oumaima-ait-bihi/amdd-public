<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdhesionPaiement extends Model
{
    use HasFactory;
    protected $table = 'adhesion_paiement';
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'tele',
        'region',
        'ville',
        'cin',
        'photo',
        'cin_face_1',
        'cin_face_2',
        'cv',
        'recu_paiement',
    ];
}
