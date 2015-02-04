<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//在index.php中
class Model{
	
	private static $single_instance;

	private $model_dir = 'model/';
	
	private $loaded_model_cache = array();
	
	
	public function __construct(){
	}
	
	public function get_filename($path){
		$extension_len = 4;
		$path_len = strlen($path);

		$last_slash_pos = strrpos($path, '/');
		$name = substr($path, $last_slash_pos + 1, $path_len - $last_slash_pos - $extension_len - 1);

		return $name;
	}
	/*
	 * 加载model的方法
	 * $model_path model所在的相对于根目录路径；
	 */
	public function load($model_path,$other_handle = NULL){
		$model_path = $this->model_dir.$model_path;

		if(!file_exists($model_path)){
			exit('Model load model ['.$model_path.'] does not exist');
		}

		$model_name = $this->get_filename($model_path);
		if($model_name){
			if( isset($this->loaded_model_cache[$model_name])){
				return;
			}
		}else{
			return;
		}
		include_once $model_path;
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
