<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_DB extends Model
{
    //
    protected $table = 'blog_data';

    protected $fillable = ['title' , 'content' , 'image'];

    public $timestamps = true ;
}
