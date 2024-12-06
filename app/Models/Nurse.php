<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Nurse extends Model
{
    use GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'phone_number',
        // TODO: look up the create_nurse_table migration
        'email',
    ];

    public static $customIdColumn = 'nurse_id';
}
