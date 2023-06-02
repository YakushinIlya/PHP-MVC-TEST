<?php

use App\system\Router;
use App\Policies\Users;

require __DIR__ . '/vendor/autoload.php';

$rout = new Users();
$rout->authControl(section:[
    'dashboard',
    'dashboard/structure',
    'dashboard/structure/add',
    'dashboard/structure/create',
    'dashboard/structure/edit',
    'dashboard/structure/update',
    'dashboard/structure/delete',
    'dashboard/users',
], request:$_GET['route']??'');
$rout = new Router(request:$_GET['route']??'');
$rout->run();