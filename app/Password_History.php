<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_History extends Model
{

    protected $fillable = ['user_id'];

    protected $hidden = ['password_last'];

}
