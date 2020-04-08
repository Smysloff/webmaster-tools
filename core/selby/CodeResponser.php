<?php

namespace core\selby;

class CodeResponser extends \core\selby\BaseTool
{
    public function work()
    {
        $result = '';

        for ($i = 0; $i < min(count($this->input), $this->limit); $i++) {

            $url = trim($this->input[$i]);

            if (filter_var($this->options['add-urls'], FILTER_VALIDATE_BOOLEAN)) {
                $result .= $url.';';
            }

            $response = filter_var($url, FILTER_VALIDATE_URL) ? 
                                        @get_headers($url)[0] : 'error';

            if (empty($response)) $response = 'error';

            $result .= $response . PHP_EOL;
        }

        return trim($result);
    }
}
