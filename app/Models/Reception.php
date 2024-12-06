<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $fillable = [
        'receptionists_id',
        'patient_id',
        'check_in',
        'check_out',
        'notes',
    ];
}
