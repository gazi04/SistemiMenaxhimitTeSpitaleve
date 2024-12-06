<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = [
        'receptionists_id',
        'personal_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
    ];
}
