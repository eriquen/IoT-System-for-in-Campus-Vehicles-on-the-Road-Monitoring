<?php 

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'D:' . DS . 'xampp' . DS . 'htdocs' . DS . 'RMS');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS .'admin' . DS . 'includes');

require_once("function.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("summon.php");
require_once("session.php");
require_once("setting.php");
require_once("follow_limit.php");
?>
