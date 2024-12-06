<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Doctor extends Model
{
    use GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'departament_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
    ];

    public static $customIdColumn = 'doctor_id';
}
