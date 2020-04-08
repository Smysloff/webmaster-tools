<?php

namespace core\controllers;

use core\selby;

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
        $codeResponser = new selby\CodeResponser($this->userData);
        $data = $codeResponser->work();
        print $data;
    }

    public function tag_parser()
    {
        $tagParser = new selby\TagParser($this->userData);
        $data = $tagParser->work();
        print $data;
    }

    public function transliter()
    {
        $transliter = new selby\Transliter($this->userData);
        $data = $transliter->work();
        print $data;
    }

    public function decoder()
    {
        $decoder = new selby\Decoder($this->userData);
        $data = $decoder->work();
        print $data;
    }

    public function sitemap()
    {
        $mapMaker = selby\SitemapMaker::newMap($this->userData);
        $data = $mapMaker->createMap();
        print $data;
    }

    public function text_analyzer()
    {
        $textAnalyzer = new selby\TextAnalyzer($this->userData);

        $data = 'Кол-во символов (с пробелами): ' . $textAnalyzer->strlen() . PHP_EOL;
        $data .= 'Кол-во символов (без пробелов): ' . $textAnalyzer->strlenNoSpaces() . PHP_EOL;
        $data .= 'Кол-во слов: ' . $textAnalyzer->wordCount() . PHP_EOL;

        print $data;
    }
}
