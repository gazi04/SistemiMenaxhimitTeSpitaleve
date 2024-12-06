<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;


class Admin extends Model
{
    use GeneratesCustomId;

    protected $fillable = [
        'password',
        'name',
        'email',
    ];

    public static $customIdColumn = 'admin_id';
}
