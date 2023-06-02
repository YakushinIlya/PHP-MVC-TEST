<?php

namespace App\system;

use App\system\View;

abstract class Controller
{
    public $rout;
    public $patch;
    public $view;
    public $param;
    
    public function __construct($param = [])
    {
        $this->param = $param;
        $this->view = new View();
    }
}
