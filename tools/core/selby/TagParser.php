<?php

namespace tools\core\selby;

use PHPHtmlParser\Dom;

class TagParser extends BaseTool
{
    public function work()
    {
        $result = '';
        $dom = new Dom;

        for ($i = 0; $i < min(count($this->input), TOOLS_ROWS_LIMIT); $i++) {

            $url = trim($this->input[$i]);

            if (filter_var($this->options['add-urls'], FILTER_VALIDATE_BOOLEAN)) {
                $result .= $url.';';
            }

            if (filter_var($url, FILTER_VALIDATE_URL)) {

                $dom->load($url);

                switch ($this->options['tag']) {
                    case 'title':
                        $match = strip_tags($dom->find('title')[0]->innerHtml);
                        break;

                    case 'h1':
                        $match = strip_tags($dom->find('h1')[0]->innerHtml);
                        break;

                    case 'description':
                        $match = strip_tags($dom->find('description')[0]->innerHtml);
                        break;

                    case 'keywords':
                        $match = strip_tags($dom->find('keywords')[0]->innerHtml);
                        break;
                    
                    default:
                        $match = 'error';
                }
                $result .= $match;

            } else {
                $result .= 'error';
            }

            $result .= PHP_EOL;
        }

        return $result;
    }
}
