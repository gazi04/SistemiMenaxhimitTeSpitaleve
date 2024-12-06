<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'admin_id',
        'password',
        'departament_id',
        'name',
        'email',
    ];
}
