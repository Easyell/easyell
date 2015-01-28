<?php
define('BASEPATH', 'easyell');


$host = $_SERVER['HTTP_HOST'];

$url = $_SERVER['PHP_SELF'];
$url_len = strlen($url);

$core_path = 'core/';
$lib_path = 'lib/';

$controller_path = 'Controller.php';
$model_path = 'Model.php';

$route_path = 'Route.php';

$application_folder = 'application';

require_once $core_path.$controller_path;
require_once $core_path.$model_path;
require_once $lib_path.$route_path;
require_once 'config/fn_map.php';


$route = new Route();
$r = $route->init($fn_map);
?>