<?php

return [
    'register' => [
        'controller' => 'register',
        'action'     => 'form',
        'path'       => '',
    ],
    'login/register' => [
        'controller' => 'register',
        'action'     => 'register',
        'path'       => '',
    ],
    'login/auth' => [
        'controller' => 'auth',
        'action'     => 'auth',
        'path'       => '',
    ],
    'dashboard' => [
        'controller' => 'dashboard',
        'action'     => 'index',
        'path'       => '',
    ],
    'dashboard/structure' => [
        'controller' => 'structure',
        'action'     => 'index',
        'path'       => '',
    ],
    'dashboard/structure/add' => [
        'controller' => 'structure',
        'action'     => 'add',
        'path'       => '',
    ],
    'dashboard/structure/create' => [
        'controller' => 'structure',
        'action'     => 'create',
        'path'       => '',
    ],
    'dashboard/structure/edit' => [
        'controller' => 'structure',
        'action'     => 'edit',
        'path'       => '',
    ],
    'dashboard/structure/update' => [
        'controller' => 'structure',
        'action'     => 'update',
        'path'       => '',
    ],
    'dashboard/structure/delete' => [
        'controller' => 'structure',
        'action'     => 'delete',
        'path'       => '',
    ],
    'dashboard/users' => [
        'controller' => 'users',
        'action'     => 'index',
        'path'       => '',
    ],
    'api/structure' => [
        'controller' => 'api',
        'action'     => 'structure',
        'path'       => '',
    ],
    'logout' => [
        'controller' => 'auth',
        'action'     => 'logout',
        'path'       => '',
    ],
];
