<?php
/*
 * 在 index.php 中
 * 
 * 路由
 * 
 * @author jyouger
 * 
 */
class Route extends Model {

	public $controller_dir = 'controller/';
	public $controller_parent = 'Controller';
	public $set_param_fn = 'set_param';

	public function __construct() {
		//controller编号
		$testfn = $_GET['fn'];
		$testparam = $_GET['param'];
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
	/*
	 * 参数处理 
	 * 
	 * 统一至Array形式
	 */
	public function param_handle(){
		$param = $this->param;		

		if(is_string($param)){
			$paramObj = json_decode($param);
			if(is_object($paramObj)){
				$param = get_object_vars($paramObj);
			}
		}
		$this->param = $param;
	}
	public function init($fn_map) {
		$result = TRUE;
		$data   = null;
		
		$this->param_handle();

		$this->load('tools/Tools.php');
		
		$controller = $fn_map[$this->fn];
		
		if (!$controller || !file_exists($this->controller_dir.$controller)) {
			$result = FALSE;
			$data   = 'not exist the controller';
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
			$result = FALSE;
			$data = 'isnt instanced of controller';
		}
		if (!method_exists($route_controller_obj, $this->set_param_fn)) {
			$result = FALSE;
			$data = 'doesnt has set_param';
		}
		
		$this->load('io/output.php');
		if($result){
			$data = $route_controller_obj->set_param($this->param);
		}
		//如果是数组返回
		if(isset($data['result'])){
			$this->output->json($data['data']);
		}else{
			$this->output->json(array(
				'result' => $data
			));
		}
	}
}
?>
