<?php
/**
 * create by guoshencheng 2015.2
 **/
class UpdatePasswordController extends Controller {
	public function __constructr() {
		parent::__construct($isSql);
	}
	
	public function set_param($param) {
		$this->load('User.php');
		$user = User::selectObjectWithAccount($param['account'])[0];
		$user->password = $param['password'];
		if($user->saveObject()) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}

}
?>
