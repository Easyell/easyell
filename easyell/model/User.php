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
		$array = $sqlOp->selectItem('User', 'id', $id);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'],$array[$i]['account'], $array[$i]['username'], $array[$i]['password'], $array[$i]['avatar'], $array[$i]['email'], $array[$i]['phone']));
		}
		return $objectArray;
	}

	public static function all(&$sqlOp) {
		$array = $sqlOp->selectItem('User');
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'],$array[$i]['account'], $array[$i]['username'], $array[$i]['password'], $array[$i]['avatar'], $array[$i]['email'], $array[$i]['phone']));
		}
		return $objectArray;
	}

	public function saveObject() {
		$this->SqlOp->connectTo();
		$values = array($this->id, $this->account, $this->username, $this->password, $this->avatar, $this->email, $this->phone);
		$result = $this->SqlOp->insertTo('User', $values);
		if($result) {
			$this->SqlOp->close();
			return $result;
		} else {
			$keys = array('account', 'username', 'password', 'avatar', 'email', 'phone');
			$values = array($this->account, $this->username, $this->password, $this->avatar, $this->email, $this->phone);
			$result = $this->SqlOp->updateItem('User', $keys, $values, 'id', $this->id);
			$this->SqlOp->close();
			return $result;
		}
	}
	
	public function deleteObject() {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->deleteItem('User', 'id', $this->id);
		$this->SqlOp->close();
		return $result;		
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
