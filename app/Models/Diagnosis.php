<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'notes',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
