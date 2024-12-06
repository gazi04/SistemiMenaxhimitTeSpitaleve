<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'patient_id',
        'technologist_id',
        'test_type',
        // TODO: look at the create_test migration
        'results',
        'status',
    ];
}
