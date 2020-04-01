<?php

namespace tools\core\controllers;

class Errors extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        echo 'Error 404: Page Not Found';
    }
}