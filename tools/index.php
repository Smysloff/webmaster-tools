<?php

use tools\core\App;

define('DS', DIRECTORY_SEPARATOR);
define('TOOLS_PATH', __DIR__);
define('ROOT_PATH', dirname(TOOLS_PATH));
define('CORE_PATH', TOOLS_PATH.DS.'core'.DS);
define('VIEWS_PATH', CORE_PATH.DS.'views'.DS);
define('DATABASE', TOOLS_PATH.DS.'database'.DS.'tools.db');

define('TOOLS_ROWS_LIMIT', 20);

require_once ROOT_PATH.DS.'vendor'.DS.'autoload.php';

App::Run();
