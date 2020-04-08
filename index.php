<?php

use core\App;

// current version
define('CURRENT_VERSION', '0.200408');

// filepathes to main folders
define('TOOLS_PATH', __DIR__);
define('ROOT_PATH',  dirname(TOOLS_PATH));
define('CORE_PATH',  TOOLS_PATH . DIRECTORY_SEPARATOR . 'core'  . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', CORE_PATH  . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

// database filepath (sqlite)
define('DATABASE', TOOLS_PATH . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'tools.db');

// MVC options
define('CONTROLLERS_NAMESPACE', '\core\controllers\\');
define('DEFAULT_CONTROLLER',    CONTROLLERS_NAMESPACE . 'Main');
define('DEFAULT_ACTION',        'index');

// URL-path to 'tools'
define('TOOLS_URL_PATH', '/tools');

// base limit on input rows
define('TOOLS_ROWS_LIMIT', 100);

// include autoloader
require 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// run application
App::Run();
