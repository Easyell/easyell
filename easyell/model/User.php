<?php
/**
 * create by guoshencheng 2015
 **/
class User extends Model {
	public $id;
	public $account;
	public $username;
	public $password;
	public $avatar;
	public $email;
	public $phone;
	
	function __construct() {
	}
	
	public function toArray() {
		return array(
			"id" => $id;
			"account" => $account;
			"username" => $username;
			"password" => $password;
			"avatar" => $avatar;
			"email" => $email;
			"phone" => $phone;	
		);
	}

	public static function selectObjectWithId($id) {
		global $SqlOp;
		$array = $SqlOp->selectItem('User', 'id', $id);
		return self::getObjectArray($array);		
	}

	public static function selectObjectWithAccount($account) {
		global $SqlOp;
		$array = $SqlOp->selectItem('User', 'account', $account);
		return self::getObjectArray($array);
	}

	public static function all() {
		global $SqlOp;
		$array = $SqlOp->selectAll('User');
		return self::getObjectArray($array);		
	}
	
	private static function getObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'],$array[$i]['account'], $array[$i]['username'], $array[$i]['password'], $array[$i]['avatar'], $array[$i]['email'], $array[$i]['phone']));
		}
		return $objectArray;
	}

	public function saveObject() {
		global $SqlOp;
		$values = array($this->id, $this->account, $this->username, $this->password, $this->avatar, $this->email, $this->phone);
		$result = $SqlOp->insertTo('User', $values);
		if($result) {
			return $result;
		} else {
			$keys = array('account', 'username', 'password', 'avatar', 'email', 'phone');
			$values = array($this->account, $this->username, $this->password, $this->avatar, $this->email, $this->phone);
			$result = $SqlOp->updateItem('User', $keys, $values, 'id', $this->id);
			return $result;
		}
	}
	
	public function deleteObject() {
		global $SqlOp;
		return $SqlOp->deleteItem('User', 'id', $this->id);
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
