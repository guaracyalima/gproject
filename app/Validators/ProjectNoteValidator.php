<?php

namespace CodeProject\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

    protected $rules = [
        'project_id' => 'required',
        'title' => 'required',
        'note' => 'required'
   ];
}
