<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    //
    protected $table = 'todo' ;

    protected $fillable = ['title' , 'content' , 'image' , 'start_date' , 'end_date'];

    public $timestamps = false;
}
