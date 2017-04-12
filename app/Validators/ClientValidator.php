<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 11/04/2017
 * Time: 14:04
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
      'name' => 'required|max:255',
      'responsible' => 'required|max:255',
      'email' => 'required|email',
      'phone' => 'required',
      'address' => 'required'
    ];
}