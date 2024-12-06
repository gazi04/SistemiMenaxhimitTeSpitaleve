<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Patient extends Model
{
    use GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'email',
    ];

    public static $customIdColumn = 'patient_id';
}
