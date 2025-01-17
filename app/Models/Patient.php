<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\GeneratesCustomId;

class Patient extends Model implements AuthenticatableContract, MustVerifyEmail
{
    use Authenticatable, Notifiable, GeneratesCustomId;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'gender',
        'phone_number',
        'email',
    ];

    public static $customIdColumn = 'id_number';

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function therapies()
    {
        return $this->hasMany(Therapy::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => now(),
        ])->save();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }
}
