<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['firstname', 'lastname', 'date_birth', 'address', 'postal_code', 'city', 'country', 'phone', 'activity', 'amount_given'];
}
