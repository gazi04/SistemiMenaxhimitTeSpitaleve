<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_id',
        'personal_id',
        'departament_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
    ];
}
