<?php

namespace App;

use Faker\Provider\Image;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class auth_Users extends Authenticatable
{
    use Notifiable;

    //
    protected $table = 'auth_table';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password' , 'image'
    ];
}
