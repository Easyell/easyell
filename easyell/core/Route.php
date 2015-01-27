<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 在 index.php 中
 */
require_once 'config/fn_map.php';

//获取路径，并小写化
$controller = $fn_map[$fn];

if(!($controller && file_exists($controller))){
	exit('no exist');	
}else{
	require_once $core_path.$controller_path;
	require_once $core_path.$model_path;
	require_once $controller;
}

/*
 * 获取类名，即文件名 
 * 
 * $controller_len 完整的路径名的长度
 * 
 * $extension_len '.php' 的拓展名长度为4
 */
function get_filename($path){
	$extension_len = 4;
	$path_len = strlen($path);
	
	$last_slash_pos = strrpos($path, '/');
	$name = substr($path, $last_slash_pos+1,$path_len-$last_slash_pos-$extension_len-1);
	
	return $name;
}
$controller_parent = 'Controller';
//自定义控制器的入口
$set_param_fn = 'set_param';

$class_name = get_filename($controller);

//实例化该控制器,并返回 
$route_controller_obj = new $class_name();

//验证继承 和 是否带有set_param方法 
if(!$route_controller_obj instanceof $controller_parent){
	exit('extends must');	
}
if (! method_exists($route_controller_obj, $set_param_fn)){
	exit('controller '.$class_name.' is not intact');	
}

$handle_result = $route_controller_obj->set_param($param);


return $handle_result;

?>