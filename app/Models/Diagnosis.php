<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        // TODO: look up the migration file
        'notes',
    ];
}
