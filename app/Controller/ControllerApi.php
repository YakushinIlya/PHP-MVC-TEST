<?php

namespace App\Controller;

use App\system\Controller;
use App\system\DB;
use App\system\View;


class ControllerApi extends Controller
{
    public string $template = 'dashboard';
    
    public function ActionStructure(): void
    {
        $id = htmlspecialchars($_GET['id']);
        $db = new DB();
        $structure = $db->queryAssoc("select * from structure where id='{$id}'")[0];

        echo View::getPatchInclude(patch: 'dashboard/api/modal-structure', data: ['structure'=>$structure]);
    }
}
