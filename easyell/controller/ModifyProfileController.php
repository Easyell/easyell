<?php
/**
 * create by guoshencheng 2015.2
 **/
class ModifyProfileController extends controller {
	public function __constructr() {
		parent::__construct($isSql);
	}	
	
	public function set_param($param) {
		$this->load('User.php');
		$user = User::selectObjectWithId($param['id']);
		$user->username = $param['username'];
		$user->avatar = $param['avatar'];
		$user->email  = $param['email'];
		$user->phone = $param['phone'];		
		if ($user->saveObject()) {
			return $user->toArray();
		} else {
			return 'fail';
		}
	}
}
?>
