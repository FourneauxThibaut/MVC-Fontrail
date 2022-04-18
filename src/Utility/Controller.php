<?php

use Latte\Engine;

class Controller
{

//      ┌────────┐
//      │  VIEW  │
//      └────────┘
    public function view($path, $data = [], $head)
    {
        $path = explode(".", $path);
        
        // Get the file name and turn it capitalized
        if ( preg_match('~^\p{Lu}~u', $path[0]) ) {
            $path = join("/",$path);
        } 
        else {
            $path[0] = ucfirst($path[0]);
            $path = join("/",$path);
        }

        $title = $head['title'];

        ob_start();

        require($_SERVER['DOCUMENT_ROOT'] . '/app/View/' . $path . '.php');
        $content = ob_get_clean();
        
        require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php');
    }
}