<?php
class SignUpController extends Controller {
	public function __constructr() {
		parent::__construct($isSql);
	}

	public function set_param($paramString) {
		$param = $this->getDecodeObject($paramString);
		$this->load('User.php');
		$user = new User();
		$user->account = $param['account'];
		$user->username = $param['username'];
		$user->password = $param['password'];
		if($user->saveObject()) {
			echo 'success';			
		} else {
			echo 'fail';
		}
	}
}
?>