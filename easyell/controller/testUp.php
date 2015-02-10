<?php

class TestUp extends Controller{
	
	function __construct(){
		
	}
	public function set_param(){
		$this->lib('Uploader.php');		
		
		$this->Uploader->upload(array(
			'field' => 'fileScope',
			'fileName' => 'xx.jpg'
		));
		
		return 'test_up';
	}
}

?>