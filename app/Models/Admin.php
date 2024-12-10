<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;


class Admin extends Model implements AuthenticatableContract
{
   use Authenticatable, GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'name',
        'email',
    ];

    public static $customIdColumn = 'id_number';
}
