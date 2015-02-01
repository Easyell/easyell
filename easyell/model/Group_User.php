<?php
class Group_User extends model{	
	public $id;
   	public $groupid;
	public $userid;
	public $projectid;
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	

// PublicMethod
	public static function selectObjectWithId($id) {
		$array = self::selectGroup_UserWithKeyAndValue('id', $id);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}
	
	public static function all() {
		$array = self::selectAll();
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}

	public static function selectAll() {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->selectAll('Group_User');
		$sqlOp->close();
		return $result;
	}

	private static function createObjectWith($id, $groupid, $userid, $projectid) {
		$object = new Group_User();
		$object->id = $id;
		$object->groupid = $groupid;
		$object->userid = $userid;
		$object->projectid = $projectid;
		return $object;
	}

	public function deleteObject() {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->deleteItem('Group_User', 'id', $this->id);
		$this->SqlOp->close();
		return $result;
	}

	public function saveObject() {
		$this->SqlOp->connectTo();
		$values = array($this->id, $this->groupid, $this->userid, $this->projectid);
		$result = $this->SqlOp->insertTo('Group_User', $values);
		if($result) {
			$this->SqlOp->close();
			return $result;
		} else {
			$keys = array('groupid', 'userid', 'projectid');
			$values = array($this->groupid, $this->userid, $this->projectid);
			$result = $this->SqlOp->updateItem('Group_User', $keys, $values, 'id', $this->id);
			$this->SqlOp->close();
			return $result;
		}
	}

//static function for ModelOption
//Select
	public static function selectGroup_UserWithId($id) {
		return self::selectGroup_UserWithKeyAndValue("id", $id);
	}
	
	public static function selectGroup_UserWithUserId($id) {
		return self::selectGroup_UserWithKeyAndValue("userid", $id);
	}

	public static function selectGroup_UserWithProjectId($id) {
		return self::selectGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public static function selectGroup_UserWithGroupId($id) {
		return self::selectGroup_UserWithKeyAndValue("groupid", $id);
	}	

//Delete
	public static function deleteGroup_UserWithId($id) {
		return self::deleteGroup_UserWithKeyAndValue("id", $id);
	}
	
	public static function deleteGroup_UserWithUserId($id) {
		return self::deleteGroup_UserWithKeyAndValue("userid", $id);
	}

	public static function deleteGroup_UserWithProjectId($id) {
		return self::eleteGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public static function deleteGroup_UserWithGroupId($id) {
		return self::deleteGroup_UserWithKeyAndValue("groupid", $id);
	}
	
//Insert
	public static function inserGroup_User($id, $groupid, $userid, $projectid) {
		$valueArray = array($id, $groupid, $userid, $projectid);
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->insertTo("Group_User", $valueArray);
		$sqlOp->close();
		return $result;
}

//Update

	public static function updateGroup_User($setKeys,$setValues,$searchKey,$searchValue) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->updateItem("Group_User", $setKeys,$setValues,$searchKey,$searchValue);
		$sqlOp->close();
		return $result;
	}

//PrivateMethod
	private static function selectGroup_UserWithKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->selectItem("Group_User", $key, $value);
		$sqlOp->close();
		return $result;
	}

	private static function deleteGroup_UserWithKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->deleteItem("Group_User", $key, $value);
		$sqlOp->close();
		return $result;
	}
}
?>
