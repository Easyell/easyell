<?php

class A extends Controller{

	private $name = 'A';
	
	public function __constructr(){
		
	}

	public function set_param(){
		
		$this->load('tools/m.php','other_name');
		
		$this->other_name->get_name();
	}
}
?>