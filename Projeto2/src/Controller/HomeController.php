<?php

namespace Andres\Controller;

class HomeController{
    public function index($params)
    {
        require '.../src/View/Home/index.php';
    }
}