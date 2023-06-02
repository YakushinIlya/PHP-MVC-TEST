<?php

namespace App\system;

class Redirect
{
    public static function to(string $url)
    {
        header('Location: ' . $url);
    }
}