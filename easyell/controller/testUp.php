<?php

class TestUp extends Controller{
	
	function __construct(){
		
	}
	public function set_param(){
		$this->lib('Uploader.php');		
		
		$result = $this->Uploader->upload(array(
			'field' => 'file',
			'fileName' => 'xx.jpg',
		));
		
		return $result;
	}
}

?>