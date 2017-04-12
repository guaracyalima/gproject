<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 11/04/2017
 * Time: 14:04
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'duo_date' => 'required',
    ];
}