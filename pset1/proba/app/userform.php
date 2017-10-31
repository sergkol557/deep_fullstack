<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
  protected $fillable = ['city', 'name'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
