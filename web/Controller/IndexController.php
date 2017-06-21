<?php

namespace web\Controller;

use core\View;

class IndexController
{
    protected $view;

    public function __construct()
    {
        $this->view=new View();
    }

    public function show()
    {
        dd($_SESSION);
        return $this->view->make("index")->with("version",'1.0');
    }

    public function login()
    {
        $builder = new Captha;
        $builder->build($width = 100, $height = 30 );
        header('Content-type: image/jpeg');
        $_SESSION["phrase"] = $builder->getPhrase();
        $builder->output();
//        return $this->view->make("login");
    }
}
