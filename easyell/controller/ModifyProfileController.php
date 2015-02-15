<?php
/**
 * create by guoshencheng 2015.2
 **/
class ModifyProfileController extends controller {
	public function __constructr() {
		parent::__construct($isSql);
	}	
	
	public function set_param($paramString) {
		$param = $this->getDecodeObject($paramString);	
		$this->load('User.php');
		$user = User::selectObjectWithId($param['id']);
		$user->username = $param['username'];
		$user->avatar = $param['avatar'];
		$user->email  = $param['email'];
		$user->phone = $param['phone'];		
		if ($user->saveObject()) {
			var_dump($user);
		} else {
			echo 'fail';
		}
	}
}
?>
