<?php

namespace App\Controller;

use App\system\Controller;
use App\system\DB;
use App\system\Redirect;
use App\system\View;

class ControllerUsers extends Controller
{
    public string $template = 'dashboard';

    public function ActionIndex(): string|null
    {
        $db    = new DB();
        $users = $db->queryAssoc('select * from users order by id desc');

        $title = 'Пользователи';
        $data  = [
            'title'   => $title,
            'content' => View::getPatchInclude(patch: 'dashboard/users', data: ['title'=>$title, 'users'=>$users]),
        ];

        return View::render(template: $this->template, contents: $data);
    }

}
