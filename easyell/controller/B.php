<?php
/*
 * 
 */
class B extends Controller{

	private $name = 'B';
	
	public function __constructr(){
		
	}
	public function set_param($param){
		return $param;
	}
	public function load($name){
		$this->name = $name;
	}
	
}
?>