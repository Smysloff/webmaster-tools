<?php

namespace tools\core\selby;

abstract class SitemapMaker extends \tools\core\selby\BaseTool
{
    public function __construct($userData)
    {
        parent::__construct($userData);
        $this->limit = 999;
    }

    public static function newMap($userData)
    {
        $type  = ucfirst(strtolower($userData['options']['type']));
        $class = __NAMESPACE__ . '\SitemapMaker\Sitemap' . $type . 'Maker';
        return new $class($userData);
    }

    abstract public function createMap();
}
