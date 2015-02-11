<?php
class UpdatePasswordController extends Controller {
	public function __constructr() {
		parent::__construct($isSql);
	}
	
	public function set_param($paramString) {
		$param = $this->getDecodeObject($paramString);
		$this->load('User.php');
		$user = User::selectObjectWithId($param['id'])[0];
		$user->password = $param['password'];
		if($user->saveObject()) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}

}
?>
