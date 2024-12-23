<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Departament extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function doctors() { return $this->hasMany(Doctor::class); }
}
