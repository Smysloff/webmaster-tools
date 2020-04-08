<?php

namespace core\selby;

abstract class BaseTool
{
    protected $input   = [];
    protected $options = [];
    protected $limit   = TOOLS_ROWS_LIMIT;

    public function __construct($userData)
    {
        $this->input = preg_split('#\n#', trim($userData['input']));
        array_walk($userData['options'], function($value, $key) {
            $this->options[$key] = $value;
        });
    }

    public function dump()
    {
        echo '<pre>';
        print_r($this->input);
        echo '</pre>';
    }
}
