<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 11/04/2017
 * Time: 23:21
 */

namespace CodeProject\OAuth;

use Auth;
class Verifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}