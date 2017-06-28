<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['firstname', 'lastname', 'mail', 'address', 'postal_code', 'city', 'country', 'phone', 'activity', 'status', 'img'];
}
