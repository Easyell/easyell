<?php
class User extends Model {

	private $id;
	private $account;
	private $username;
	private $password;
	private $avatar;
	private $email;
	private $phone;
	function __construct() {
		$this->load('tools/SqlOp.php');
	}

	//Public Method
	public static function insertUser($id, $account, $username, $password, $avatar, $email, $phone) {
		$values = array($id, $account, $username, $password, $avatar, $email, $phone);
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->insertTo('User', $values);
		$sqlOp->close();
		return $result;
	}

	public static function updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->updateItem('User', $setKeys, $setValues, $searchKey, $searchValue);
		$sqlOp->close();
		return $result;
	}

	public static function selectUserWithId($id) {
		return self::selectUserWithSearchKeyAndValue('id', $id);	
	}

	public static function selectUserWithAcount($account) {
		return self::selectUserWithSearchKeyAndValue('account', $account);
	}

	public static function selectUserWithUsername($username) {
		return self::selectUserWithSearchKeyAndValue('username', $username);
	}

	public static function deleteUserWithId($id) {
		return self::deleteUserWithKeyAndValue('id', $id);
	}

	public static function deleteUserWithUsername($username) {
		return self::deleteUserWithKeyAndValue('username', $username);
	}

	public static function deleteUserWithAccount($account) {
		return self::deleteUserWithKeyAndValue('account', $account);
	}

	//Private Method
	private static function selectUserWithSearchKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->selectItem('User', $key, $value);
		$sqlOp->close();
		return $result;
	}
	
	private static function deleteUserWithKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->deleteItem('User', $key, $value);
		$sqlOp->close();
		return $result;
	}
}
?>
