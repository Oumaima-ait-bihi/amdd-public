<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    
    protected $fillable = [
        // other fillable columns...
        'visit_time',
        'ip_address',
        
    ];
    protected $casts = [
        'visit_time' => 'datetime:Y-m-d',
    ];
}
