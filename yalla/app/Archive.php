<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = ['title', 'slug', 'content' , 'img', 'category_id', 'lang', 'resume', 'written_by', 'views', 'saved_id'];
}
