<?php

namespace App\Controller;

use App\system\Controller;
use App\system\DB;
use App\system\Redirect;
use App\system\View;

class ControllerRegister extends Controller
{
    public string $template = 'guest';

    public string $fullname;
    public string $email;
    public string $password;

    public function __construct(array $param = [])
    {
        $this->fullname = htmlspecialchars($_POST['name']??null);
        $this->email    = htmlspecialchars($_POST['email']??null);
        $this->password = htmlspecialchars($_POST['password']??null);

        parent::__construct($param);
    }

    public function ActionForm(): string|null
    {
        $data = [
            'title'   => 'Регистрация',
            'content' => View::getPatch('register'),
        ];

        return View::render(template: $this->template, contents: $data);
    }

    public function ActionRegister()
    {
        if(empty($_POST['email'])) {
            Redirect::to(url:'/');
        }

        $ocm  = ocm_method;
        $salt = secret_password_key;
        $iv   = secret_password_iv;
        $password = openssl_encrypt($this->password, $ocm, $salt, 0, $iv);

        $db = new DB();
        $db->query('insert into users (fullname, email, password) values ("'.$this->fullname.'", "'.$this->email.'", "'.$password.'")');
        $res = $db->queryAssoc('select id from users where email="'.$this->email.'"');

        if($res) {
            setcookie("user_id", $res[0]['id'], time()+3600, '/');
            setcookie("email", $this->email, time()+3600, '/');
            setcookie("password", $password, time()+3600, '/');

            Redirect::to(url:'/dashboard');
        }
    }

}
