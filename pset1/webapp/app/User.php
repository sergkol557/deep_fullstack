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
        'name', 'email', 'role', 'password', 'blocked',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password','remember_token',
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

    public static function changeUserData($data)
    {

        $form = self::where('id', $data['id'])->first();
        $form->name = $data['name'];
        $form->email = $data['email'];
        $form->role = $data['role'];
        $form->blocked = $data['blocked'];
        $form->save();

    }

    public function isBlocked()
    {
        return $this->blocked === 1 ;
    }
}
