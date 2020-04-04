<?php

use tools\core\App;

// полные пути до папок
define('TOOLS_PATH', __DIR__);
define('ROOT_PATH',  dirname(TOOLS_PATH));
define('CORE_PATH',  TOOLS_PATH . DIRECTORY_SEPARATOR . 'core'  . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', CORE_PATH  . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

// database filepath (sqlite)
define('DATABASE', TOOLS_PATH . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'tools.db');

// MVC options
define('CONTROLLERS_NAMESPACE', '\tools\core\controllers\\');
define('DEFAULT_CONTROLLER',    CONTROLLERS_NAMESPACE . 'Main');
define('DEFAULT_ACTION',        'index');

// URL-path to 'tools'
define('TOOLS_URL_PATH', '/tools');

// базовое ограничение на максимальное число строк для входных данных
define('TOOLS_ROWS_LIMIT', 100);

// include autoloader
require ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Run application
App::Run();
