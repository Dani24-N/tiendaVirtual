<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_History extends Model
{

    protected $fillable = ['user_id','password_last',];

   // protected $hidden = [];

    protected $table = 'password_histories';

}
