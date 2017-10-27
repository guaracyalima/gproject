<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'reponsible',
        'email',
        'phone',
        'address',
        'obs'
    ];
}
