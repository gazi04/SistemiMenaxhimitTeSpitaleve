<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = [
        'nurses_id',
        'personal_id',
        'first_name',
        'last_name',
        'phone_number',
        // TODO: look up the create_nurse_table migration
        'email',
    ];
}
