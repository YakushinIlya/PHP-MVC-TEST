<?php

namespace App\Controller;

use App\system\Controller;
use App\system\View;

class ControllerHome extends Controller
{
    public string $template = 'guest';
    
    public function ActionIndex(): string|null
    {
        $data = [
            'title'   => 'Главная страница - вход',
            'content' => View::getPatch('auth'),
        ];

        return View::render(template: $this->template, contents: $data);
    }
}
