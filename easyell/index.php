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

$index_filename = 'index.php';
$index_filename_len = strlen($index_filename);

$filename_pos = stripos($url,$index_filename);
//切割路径,提取index.php后面的路由部分
//localhost/lib/index.php/a/b  到 /a/b
$route = substr($url, $filename_pos+$index_filename_len,$url_len-$filename_pos-$index_filename_len);

$fn = $_GET['fn'];
$fn = intval($fn);

$param = $_GET['param'];

$callback = $_GET['callback'];

if( !(!$route && $fn )){
	exit('excess request url or didn\'t set fn or fn is illegal');
}

require_once $core_path.$controller_path;
require_once $core_path.$model_path;
require_once $lib_path.$route_path;
require_once 'config/fn_map.php';


$route = new Route();
$r = $route->init($fn_map);
?>