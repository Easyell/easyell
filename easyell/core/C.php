<?php

class C {

	private $model_dir = 'model/';
	private $lib_dir ='lib/';
	
	public $loaded_model_cache = array();
	
	/*
	 * 获取php文件的名
	 */
	public function get_filename($path){
		$extension_len = 4;
		$path_len = strlen($path);

		$last_slash_pos = strrpos($path, '/');
		$name = substr($path, $last_slash_pos + 1, $path_len - $last_slash_pos - $extension_len - 1);

		return $name;
	}
	/*
	 * 加载lib的模块
	 * 
	 */
	public function lib($libName,$other_handle = NULL){
		$libPath = $this->lib_dir.$libName;
		
		$this->load_file($libPath, $other_handle);
	}
	/*
	 * 加载model的方法
	 * $model_path model所在的相对于根目录路径；
	 */
	public function load($model_path,$other_handle = NULL){
		$model_path = $this->model_dir.$model_path;
		
		$this->load_file($model_path, $other_handle);
	}
	/*
	 * 加载lib或model
	 */
	public function load_file($path,$other_handle){
		if(!file_exists($path)){
			exit('controller load model ['.$path.']  does not exist');
		}

		$model_name = $this->get_filename($path);
		if($model_name){
			if( isset($this->loaded_model_cache[$model_name]) ){
				return;
			}
		}else{
			return;
		}
		include_once $path;
		$model_instance = new $model_name();
		//验证 model的继承
		if(!$model_instance instanceof Model){
			exit('load '.$path.' doest not exntend to Model');
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