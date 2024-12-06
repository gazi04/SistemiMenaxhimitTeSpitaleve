<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_id',
        'personal_id',
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'email',
    ];
}
