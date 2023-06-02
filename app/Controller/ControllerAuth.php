<?php

namespace App\Controller;

use App\system\Controller;
use App\system\DB;
use App\system\Redirect;

class ControllerAuth extends Controller
{
    public string $redirectTo = '/';
    public string $email;
    public string $password;

    public function __construct($param = [])
    {
        $this->email    = htmlspecialchars($_POST['email']??null);
        $this->password = htmlspecialchars($_POST['password']??null);

        parent::__construct($param);
    }

    public function ActionAuth()
    {
        $ocm  = ocm_method;
        $salt = secret_password_key;
        $iv   = secret_password_iv;

        $db  = new DB();
        $res = $db->queryAssoc('select id, email, password from users where email="'.$this->email.'"');
        if (empty($res)) {
            Redirect::to(url: $this->redirectTo);
        }

        $password = openssl_decrypt($res[0]['password'], $ocm, $salt, 0, $iv);

        if ($password !== $this->password) {
            Redirect::to(url: $this->redirectTo);
        }

        setcookie("user_id", $res[0]['id'], time()+3600, '/');
        setcookie("email", $this->email, time()+3600, '/');
        setcookie("password", $res[0]['password'], time()+3600, '/');

        Redirect::to(url: '/dashboard');
    }

    public function ActionLogout()
    {
        setcookie("email", '', time()-3600, '/');
        setcookie("password", '', time()-3600, '/');

        Redirect::to(url: '/');
    }
}
