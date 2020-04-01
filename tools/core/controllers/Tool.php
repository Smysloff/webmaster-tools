<?php

namespace tools\core\controllers;

use tools\core\tools;

class Tool extends Controller
{
    private $userData;

    public function __construct()
    {
        $userData = file_get_contents('php://input');
        $userData = strip_tags($userData);
        $this->userData = json_decode($userData, true);
    }

    public function response_code()
    {
        $codeResponser = new tools\CodeResponser($this->userData);
        $data = $codeResponser->work();
        print $data;
    }

    public function tag_parser()
    {
        $tagParser = new tools\TagParser($this->userData);
        $data = $tagParser->work();
        print $data;
    }

    public function transliter()
    {
        $transliter = new tools\Transliter($this->userData);
        $data = $transliter->work();
        print $data;
    }

    public function decoder()
    {
        $decoder = new tools\Decoder($this->userData);
        $data = $decoder->work();
        print $data;
    }

    public function sitemap()
    {
        $sitemapper = new tools\Sitemapper($this->userData);
        $data = $sitemapper->work();
        print $data;
    }
}