<?php

class B extends Controller{

	private $name = 'B';
	
	public function __constructr(){
		
	}
	
	public function load($name){
		$this->name = $name;
	}
	
}
?>