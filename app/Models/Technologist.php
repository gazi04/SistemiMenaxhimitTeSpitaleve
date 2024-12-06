<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Technologist extends Model
{
    use GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
    ];

    public static $customIdColumn = 'technologist_id';
}
