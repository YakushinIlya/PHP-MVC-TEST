<?php

namespace App\Helpers;

use App\system\DB;

class Structure
{
    public static function getStructure($structures, $parent_id)
    {
        $dataHtml = '';

        foreach ($structures as $data) {
            if ($data['parent_id'] == $parent_id) {
                $dataHtml .= '<li id="item-' . $data['id'] . '">' . "\n";
                $dataHtml .= '<img src="/media/img/marker.png" id="img-' . $data['id'] . '" alt="" onclick="displayShow(' . $data['id'] . ')">'."\n";
                $dataHtml .= '    <a href="#" onclick="modalShow(' . $data['id'] . ')" id="a-' . $data['id'] . '">' . $data['title'] . "</a>";
                $dataHtml .= '    ' . self::getStructure($structures, $data['id']);
                $dataHtml .= '</li>' . "\n";
            }
        }

        return $dataHtml ? '<ul>' . $dataHtml . '</ul>' . "\n" : '';
    }

    public static function structureDelete($structure, $element_id)
    {
        $db = new DB();
        foreach ($structure as $data) {
            if ($data['parent_id'] == $element_id) {
                self::structureDelete($structure, $data['id']);
                $db->query('delete from structure where id="'.$data['id'].'"');
            }
        }
    }
}