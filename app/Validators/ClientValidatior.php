<?php
    /**
     * Created by PhpStorm.
     * User: GAlima
     * Date: 27/10/2017
     * Time: 13:56
     */

    namespace CodeProject\Validators;


    use Prettus\Validator\LaravelValidator;

    class ClientValidatior extends LaravelValidator
    {
        protected $rules = [
          'name' => 'required|max:254',
          'responsible' => 'required|max:254',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required'
        ];
    }