<?php

namespace CodeProject\Entities;

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
