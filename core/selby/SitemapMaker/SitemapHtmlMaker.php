<?php

namespace core\selby\SitemapMaker;

use PHPHtmlParser\Dom;

class SitemapHtmlMaker extends \core\selby\SitemapMaker
{
    public function createMap(): ?string
    {
        $result = '';
        $dom = new Dom;

        for ($i = 0; $i < min(count($this->input), $this->limit); $i++) {

            $parts = explode(';', trim($this->input[$i]), 2);
            $url   = $parts[0];
            $text  = $parts[1];

            try {
                if (empty($text)) {
                    $dom->load($url);
                    $text = strip_tags($dom->find('h1')[0]->innerHtml);
                }

                if (empty($text)) {
                    $text = strip_tags($dom->find('title')[0]->innerHtml);
                }

                if (!empty($text)) {
                    $result .= "<li><a href=\"$url\">$text</a></li>".PHP_EOL;
                } else {
                    $result .= 'ERROR: URL IS WRONG'.PHP_EOL;
                }

            } catch (\Exception $e) {
                $result .= 'ERROR: URL IS WRONG'.PHP_EOL;
            }
        }

        return trim($result);
    }
}
