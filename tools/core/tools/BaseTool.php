<?php

namespace tools\core\tools;

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

    abstract public function work();
}
