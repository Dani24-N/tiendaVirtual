<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Password_Reset extends Model
{
    use Notifiable;

    protected $fillable = ['email'];

    protected $hidden = ['token'];

    protected $table = 'password_resets';

}
