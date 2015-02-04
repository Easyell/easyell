<?php
/*
 * 
 */
class B extends Controller{

	private $name = 'B';
	
	public function __constructr(){
		
	}
	public function set_param($param){
		var_dump($SqlOp);
		var_dump($GLOBALS);
		var_dump($this->SqlOp);
		return $param;
	}
	public function load($name){
		$this->name = $name;
	}
	
}
?>