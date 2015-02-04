<?php
/*
 * 
 */
class B extends Controller{

	private $name = 'B';
	
	public function __constructr($isSql = FALSE){
		parent::__construct($isSql);
	}
	public function set_param($param){
		global $SqlOp;
		var_dump($SqlOp);
		$this->close();
		
		return $param;
	}
}
?>