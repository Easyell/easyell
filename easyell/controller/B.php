<?php
//这是一个示例文件，没点屁用
class B extends Controller{

	private $name = 'B';
	
	public function __constructr(){
		
	}
	
	public function load($name){
		$this->name = $name;
	}
	
}
?>