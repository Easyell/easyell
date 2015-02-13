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
		$values = array('', 'guoshencheng2', 'guoshencheng2', '123456', 'avatar', 'email-email', 'guoshenchengphone');
		if ($SqlOp->insertTo('User', $values)) {
			echo 'success';
			//var_dump($SqlOp->selectAll('User'));
		} else {
			echo 'fail';
		}	
		$this->close();
		
		return $param;
	}
}
?>
