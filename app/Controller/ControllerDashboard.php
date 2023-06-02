<?php

namespace App\Controller;

use App\system\Controller;
use App\system\View;

class ControllerDashboard extends Controller
{
    public string $template = 'dashboard';
    
    public function ActionIndex(): string|null
    {
        $title = 'Dashboard';
        $data = [
            'title'   => $title,
            'content' => View::getPatch(patch: 'dashboard/index', data: ['title'=>$title]),
        ];

        return View::render(template: $this->template, contents: $data);
    }
}
