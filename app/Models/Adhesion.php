<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    use HasFactory;
    protected $table = 'adhesion_preinscription';
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'cin',
        'email',
        'cv_path',
        'recu_path',
        'membre_options',
        'paiement_options',
        'comite_options',
        'autrePRO',
        'tele',
        'region',
        'ville',
        'profession_options',
        'specialite',
        'niveau_etude',
    ];
    
    
}
