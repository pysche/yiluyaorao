<?php
date_default_timezone_set('Asia/Shanghai');

define('LJA_ONE_DAY', 86400);
define('LJA_START_TIME', microtime());
define('LJA_FORCE_RELOAD_CONFIG', getenv('LJA_FORCE_RELOAD_CONFIG') ? (bool)getenv('LJA_FORCE_RELOAD_CONFIG') : false);
define('LJA_LOCAL_CACHER', getenv('LJA_LOCAL_CACHER') ? getenv('LJA_LOCAL_CACHER') : 'apc');

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/../application/modules/default/models'),
    get_include_path(),
)));

require_once 'Lja' . DIRECTORY_SEPARATOR . 'Loader.php';
Lja_Loader::getInstance()->register();

Lja_Timer::start('application');

$config = &Lja_Config::getInstance();

$application = new Lja_Application(APPLICATION_ENV, $config);
$application->bootstrap()->run();