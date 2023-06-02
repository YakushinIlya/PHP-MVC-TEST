<?php

namespace App\Controller;

use App\Helpers\Structure;
use App\system\Controller;
use App\system\Redirect;
use App\system\View;
use App\system\DB;
use http\Exception\BadMessageException;

class ControllerStructure extends Controller
{
    public string $template = 'dashboard';

    public string $title;
    public string $description;
    public string $parent;

    public function __construct(array $param = [])
    {
        $this->title       = htmlspecialchars($_POST['title']??null);
        $this->description = htmlspecialchars($_POST['description']??null);
        $this->parent      = htmlspecialchars($_POST['parent']??null);

        parent::__construct($param);
    }

    public function ActionIndex(): string|null
    {
        $db = new DB();
        $structure = $db->queryAssoc('select * from structure order by id desc');

        $structure = Structure::getStructure(structures: $structure, parent_id: 0);

        $title = 'Структура';
        $data = [
            'title'   => $title,
            'content' => View::getPatchInclude(patch: 'dashboard/structure', data: ['title'=>$title, 'structures'=>$structure]),
        ];

        return View::render(template: $this->template, contents: $data);
    }

    public function ActionAdd(): string|null
    {
        $db = new DB();
        $structures = $db->queryAssoc('select * from structure order by id desc');

        $title = 'Добавление элемента';
        $data = [
            'title'   => $title,
            'content' => View::getPatchInclude(patch: 'dashboard/structure/add', data: ['title'=>$title, 'structures'=>$structures]),
        ];

        return View::render(template: $this->template, contents: $data);
    }

    public function ActionCreate()
    {
        if(empty($_POST['title'])) {
            Redirect::to(url: '/dashboard/structure/add');
        }

        $author_id = $_COOKIE['user_id'];
        $this->parent = $this->parent!=''?$this->parent:0;

        $db = new DB();
        $res = $db->query('insert into structure (title, description, parent_id, author) values 
                                                               ("'.$this->title.'", "'.$this->description.'", "'.$this->parent.'", "'.$author_id.'")');

        Redirect::to(url: '/dashboard/structure');
    }

    public function ActionEdit(): string|null
    {
        $id = htmlspecialchars($_GET['id']??null);
        $db = new DB();
        $element    = $db->queryAssoc('select * from structure where id="'.$id.'"')[0];
        $structures = $db->queryAssoc('select * from structure order by id desc');

        $title = 'Редактирование элемента';
        $data = [
            'title'   => $title,
            'content' => View::getPatchInclude(patch: 'dashboard/structure/edit', data: ['title'=>$title, 'element'=>$element, 'structures'=>$structures]),
        ];

        return View::render(template: $this->template, contents: $data);
    }

    public function ActionUpdate()
    {
        if(empty($_POST['title'])) {
            Redirect::to(url: '/dashboard/structure/edit?id='.$_GET['id']);
        }

        $element_id = htmlspecialchars($_GET['id']);
        $author_id = $_COOKIE['user_id'];
        $this->parent = $this->parent!=''?$this->parent:0;

        $db = new DB();
        $res = $db->query('update structure set title="'.$this->title.'", description="'.$this->description.'", parent_id="'.$this->parent.'", author="'.$author_id.'" 
        where id="'.$element_id.'"');

        Redirect::to(url: '/dashboard/structure');
    }

    public function ActionDelete()
    {
        $element_id = htmlspecialchars($_GET['id']);

        $db = new DB();
        $structure = $db->queryAssoc('select * from structure order by id desc');

        Structure::structureDelete(structure: $structure, element_id: $element_id);

        $db->query('delete from structure where id="'.$element_id.'"');

        Redirect::to(url: '/dashboard/structure');
    }
}
