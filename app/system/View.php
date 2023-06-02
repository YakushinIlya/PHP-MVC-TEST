<?php

namespace App\system;

class View
{
    public static function render(string $template, array $contents = null, array $data = null)
    {
        if (is_array(($data))) {
            foreach ($data as $key => $val) {
                $data[$key] = self::getContents("http://{$_SERVER['HTTP_HOST']}/resource/View/patch/{$val}.php");
            }
            $contents = array_merge($contents, $data);
        }
        if (!empty($contents)) {
            extract($contents);
        }
        require 'resource/View/template/' . $template . '.php';
    }

    public static function getPatchInclude(string $patch, array $data = [])
    {
        ob_start();
        extract($data);
        include("resource/View/patch/{$patch}.php");   // execute the file
        $content = ob_get_contents();    // get the contents from the buffer
        ob_end_clean();

        return $content;
    }

    public static function getPatch(string $patch, array $data = [])
    {
        $res = self::getContents("http://{$_SERVER['HTTP_HOST']}/resource/View/patch/{$patch}.php", $data);

        return $res;
    }
    
    public static function getContents(string $url, array $data = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
