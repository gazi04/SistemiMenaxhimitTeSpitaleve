<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Nurse extends Model implements AuthenticatableContract
{
    use Authenticatable, GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'phone_number',
        // TODO: look up the create_nurse_table migration
        'email',
        'is_employed'
    ];

    public static $customIdColumn = 'id_number';
}
