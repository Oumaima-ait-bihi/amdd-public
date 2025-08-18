<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    use HasFactory;
    protected $table = 'comites';

    protected $fillable = ['comite_name', 'status']; 
    public function comites()
{
    return $this->belongsTo(Comite::class, 'comite_id');
}
}
