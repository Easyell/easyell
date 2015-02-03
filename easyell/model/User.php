<?php
class User extends Model {

	public $id;
	public $account;
	public $username;
	public $password;
	public $avatar;
	public $email;
	public $phone;
	function __construct() {
		$this->load('db/SqlOp.php');
	}

	public static function selectObjectWithId($id, &$sqlOp) {
		
	}

	public static function all(&$sqlOp) {
		
	}

	public function saveObject() {
		
	}
	
	public function deleteObject() {
		
	}

	private static function createObjectWith($id, $account, $username, $password, $avatar, $email, $phone) {
		$object = new User();
		$object->id = $id;
		$object->account = $account;
		$object->username = $username;
		$object->password = $password;
		$object->avatar = $avatar;
		$object->email = $email;
		$object->phone = $phone;
		return $object;
	}
}
?>
