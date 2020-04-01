<?php

namespace tools\core\tools;

class Decoder extends BaseTool
{
    public function work()
    {
        $result = '';

        for ($i = 0; $i < min(count($this->input), $this->limit); $i++) {

            // ...
            $raw = trim($this->input[$i]);

            if (filter_var($this->options['add-src'], FILTER_VALIDATE_BOOLEAN)) {
                $result .= $raw.';';
            }

            switch ($this->options['module']) {
                
                case 'url':
                    $result .= $this->url_module($raw, $this->options['type']);
                    break;
                
                case 'base64':
                    $result .= $this->base64_module($raw, $this->options['type']);
                    break;

                default:
                    $result .= 'error';
            }

            $result .= PHP_EOL;
        }

        return trim($result);
    }

    private function url_module(string $str, string $type): string
    {
        if ($type == 'code') {
            return urlencode($str);
        }

        if ($type == 'decode') {
            return urldecode($str);
        }

        return 'error';
    }

    private function base64_module(string $str, string $type): string
    {
        if ($type == 'code') {
            return base64_encode($str);
        }

        if ($type == 'decode') {
            return base64_decode($str);
        }

        return 'error';
    }
}
