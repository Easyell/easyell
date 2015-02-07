<?php
/*
 * 在 index.php 中
 */
class Route extends Model {

	public $controller_dir = 'controller/';
	public $controller_parent = 'Controller';
	public $set_param_fn = 'set_param';

	public function __construct() {
		//controller编号
		if(isset($_GET['fn']) && isset($_GET['param'])){
			$this->fn = $_GET['fn'];
			$this->fn = intval($this->fn);
			//随身参数
			$this->param = $_GET['param'];
			
		}else if(isset($_POST['fn']) && isset($_POST['param'])){
			$this->fn = $_POST['fn'];
			$this->fn = intval($this->fn);
			//随身参数
			$this->param = $_POST['param'];
			
		}else{
			exit('must have fn and param');
		}
	}
	public function init($fn_map) {
		$this->load('tools/Tools.php');
		
		$controller = $fn_map[$this->fn];

		if (!$controller || !file_exists($this->controller_dir.$controller)) {
			return FALSE;
		}
		//实例化该控制器,并返回
		$class_name = $this->Tools->get_php_filename($controller);

		include_once $this->controller_dir.$controller;
		if($this->fn>2000){
			$route_controller_obj = new $class_name(TRUE);
		}else{
			$route_controller_obj = new $class_name();
		}

		//验证继承 和 是否带有set_param方法
		if (!$route_controller_obj instanceof $this->controller_parent) {
			return FALSE;
		}
		if (!method_exists($route_controller_obj, $this->set_param_fn)) {
			return FALSE;
		}
		
		$result = $route_controller_obj->set_param($this->param);

		$this->load('io/output.php');
		//如果是数组返回
		if(isset($result['result'])){
			$this->output->json($result['data']);
		}else{
			$this->output->json(array(
				'result' => $result
			));
		}
	}
}
?>
