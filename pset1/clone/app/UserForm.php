<?php

namespace webapp;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $fillable = [
        'city', 'country', 'email'
    ];

    protected $table = 'user_forms';

    public function user()
    {
        return $this->belongsTo(User::class, 'email');
    }

    public function addForm($data)
    {
        $form = $this->where('email', $data['email'])->first() ?? $this;
        $form->city = $data['city'];
        $form->country = $data['country'];
        $form->email = $data['email'];
        $form->save();
    }

    public static function changeUserFormData($data)
    {

        $form = self::where('id', $data['id'])->first();
        $form->city = $data['city'];
        $form->country = $data['country'];
        $form->save();

    }

    public static function getUserForm($email){

        return self::where('email', $email)->first() ?? ['city' => '', 'country' => ''];
    }

    public static  function deleteUserForm ($id)
    {
        self::where('id', $id)->delete();
    }
}
