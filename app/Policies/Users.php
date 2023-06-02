<?php

namespace App\Policies;

use App\system\DB;
use App\system\Redirect;

class Users
{
    public string $redirectTo       = '/';
    public string $redirectToLogout = '/logout';

    public function authControl(array|string $section, string $request)
    {
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $email = htmlspecialchars($_COOKIE['email']);
            $pass  = htmlspecialchars($_COOKIE['password']);
        } elseif (in_array($request, $section)) {
            Redirect::to($this->redirectTo);
        } else {
            return true;
        }

        $db = new DB();
        $res = $db->queryAssoc('select email, password from users where email="'.$email.'" and password="'.$pass.'"');

        if (empty($res)) {
            Redirect::to($this->redirectToLogout);
        }

        return true;
    }
}