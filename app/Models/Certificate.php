<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $primaryKey = 'certificate_id';

    protected $fillable = [
        'certificate_code',
        'recipient_name_ar',
        'recipient_name_fr',
        'workshop_title_ar',
        'workshop_title_en',
        'workshop_date',
        'duration',
    ];
}
