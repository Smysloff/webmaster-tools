<?php

namespace tools\core\controllers;

class Main extends Controller
{
    public function index()
    {
        include_once VIEWS_PATH.'layout.php';
    }
}