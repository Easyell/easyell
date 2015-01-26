<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 在 core/route.php 中
 * 
 */
class Controller{
	
	private static $single_instance;
	
	private $model_dir = 'model/';
	
	private $loaded_model_cache = array();
	
	public function __construct(){
	}
	/*
	 * 加载model的方法
	 * $model_path model所在的相对于根目录路径；
	 */
	public function load($model_path,$other_handle){
		$model_path = $this->model_dir.$model_path;

		if(!file_exists($model_path)){
			exit('model does not exist');
		}
		$model_name = get_filename($model_path);

		if($this->loaded_model_cache[$model_name]){
			return;
		}
		require_once $model_path;
		$model_instance = new $model_name();
		
		//验证 model的继承
		if(!$model_instance instanceof Model){
			exit('load '.$model_path.' no exntend');
		}	
		if($other_handle){
			$this->$other_handle = $model_instance;
		}else{
			$this->$model_name = $model_instance;
		}
		$this->loaded_model_cache[$model_name] = $model_instance;
	}
}

?>