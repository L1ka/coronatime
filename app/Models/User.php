<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $guarded = ['id'];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }



    public function verifyUser(): HasOne
    {
        return $this->hasOne(VerifyUser::class);
    }



    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
