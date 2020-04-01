<?php

namespace tools\core\tools;

class TagParser extends BaseTool
{
    public function work()
    {
        $result = '';

        for ($i = 0; $i < min(count($this->input), TOOLS_ROWS_LIMIT); $i++) {

            $url = trim($this->input[$i]);

            if (filter_var($this->options['add-urls'], FILTER_VALIDATE_BOOLEAN)) {
                $result .= $url.';';
            }

            if (filter_var($url, FILTER_VALIDATE_URL)) {

                $page = @file_get_contents(trim($this->input[$i]));

                switch ($this->options['tag']) {
                    case 'title':
                        $pattern = '#<title>(.+?)</title>#su';
                        preg_match($pattern, $page, $match);
                        break;

                    case 'h1':
                        $pattern = '#<h1[^>]*?>(.+?)</h1>#su';
                        preg_match($pattern, $page, $match);
                        break;

                    case 'description':
                        $pattern = '#<meta(?=[^>]* name *= *"?description"?) [^>]*?(?<= )content *= *"([^"]*)"[^>]*>#su';
                        preg_match($pattern, $page, $match);
                        break;

                    case 'keywords':
                        $pattern = '#<meta(?=[^>]* name *= *"?keywords"?) [^>]*?(?<= )content *= *"([^"]*)"[^>]*>#su';
                        preg_match($pattern, $page, $match);
                        break;
                    
                    default:
                        $match = [];
                }
                $result .= $match[1] ?: 'error';

            } else {
                $result .= 'error';
            }

            $result .= PHP_EOL;
        }

        return trim($result);
    }
}