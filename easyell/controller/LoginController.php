<?php 
/**
 * create by guoshencheng 2015
 **/
class LoginController extends Controller {
	private $name = 'LoginController';
	public function __constructr() {
		parent::__construct($isSql);
	}
	public function set_param($param) {
		$account = $param['account'];
		$password = $param['password'];
		$this->load('User.php');
		$user = User::selectObjectWithAccount($account)[0];
		if ($user) {
			if ($user->password == $password) {
				var_dump($user);
			} else {
				echo 'password error';
			}
		} else {
			echo 'account not exist';
		}
	}
}
?>
