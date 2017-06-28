<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['firstname', 'lastname', 'birth_date', 'city', 'country', 'activity', 'status', 'img'];
}
