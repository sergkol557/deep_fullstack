<?php

namespace webapp;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_forms()
    {
        return $this->hasOne(UserForm::class, 'email');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function getEmail()
    {
        return $this->email;
    }


}
