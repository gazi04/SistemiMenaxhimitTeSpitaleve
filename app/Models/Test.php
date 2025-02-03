<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'patient_id',
        'technologist_id',
        'test_type',
        'results',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function technologist()
    {
        return $this->belongsTo(Technologist::class, 'technologist_id');
    }
}
