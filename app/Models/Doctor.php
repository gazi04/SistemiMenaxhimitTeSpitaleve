<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Doctor extends Model implements AuthenticatableContract
{
    use Authenticatable, GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'departament_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'is_employed'
    ];

    public static $customIdColumn = 'id_number';
}
