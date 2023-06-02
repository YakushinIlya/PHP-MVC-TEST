<?php

namespace app\system;

class Router
{
    public $request = [];
    public $patch   = [];
    public $rout    = [];

    public $controller;
    public $action;
        
    public function __construct(string $request = null)
    {
        $request = trim($request, '/');
        if (!empty($request) && !is_array($this->getConfigRout($request))) {
            $this->request = explode('/', $request);
        } elseif (is_array($this->getConfigRout($request))) {
            $this->request = [
                $this->getConfigRout($request)['controller'],
                $this->getConfigRout($request)['action'],
                $this->getConfigRout($request)['path'],
            ];
        } else {
            $this->request = [
                CTRL,
                ACTN,
                PATH,
            ];
        }

        /*var_dump($this->request);
        exit();*/
    }

    public function run()
    {
        $ctrl = 'App\Controller\Controller' . ucfirst($this->request[0]);
        $actn = 'Action' . ucfirst($this->request[1]);

        if (class_exists($ctrl)) {
            if (method_exists($ctrl, $actn)) {
                $controller = new $ctrl();
                $controller->$actn($this->request[2]);
            } else {
                $this->error(404);
            }
        } else {
            $this->error(404);
        }
    }

    public function getConfigRout(string $request = null)
    {
        $req  = [];
        $ctrl = '';
        if (!empty($request)) {
            $req = explode('/', $request);
        }
        $this->rout = require 'resource/rout.php';
        if (is_array($this->rout) && array_key_exists($request, $this->rout)) {
            return $this->rout[$request];
        } elseif (!empty($req)) {
            for ($i=1; count($req)>$i; $i++) {
                $patch[] = $req[$i];
            }
            $this->patch = $patch;
            $rout = $this->rout[$req[0]];
            return [
                'controller' => $rout['controller'],
                'action'     => $rout['action'],
                'path'      => $this->patch
            ];
        } else {
            return false;
        }
    }

    public function error($number)
    {
        exit('Номер ошибки: ' . $number);
    }
}
