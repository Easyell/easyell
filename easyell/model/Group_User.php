<?php
/**
 * create by guoshencheng 2015
 **/
class Group_User extends model{	
	public $id;
   	public $groupid;
	public $userid;
	public $projectid;
	public function __construct() {
	}
	
	public function toArray(){
		return array(
			"id" =>	$id,
			"groupid" => $groupid,
			"userid" => $userid,
			"projectid" => $projectid
		);
	}

// PublicMethodi
	public static function selectObjectWithId($id) {
		global $SqlOp;
		$array = $SqlOp->selectItem('Group_User', 'id', $id);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}

	public static function selectObjectWithUserId($userId) {
		global $SqlOp;
		$array = $SqlOp->selectItem('Group_User', 'userid',$userId);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}
	
	public static function all() {
		$array = self::selectAll($sqlOp);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}

	public static function selectAll() {
		global $SqlOp;
		$result = $SqlOp->selectAll('Group_User');
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
		global $SqlOp;
		return $SqlOp->deleteItem('Group_User', 'id', $this->id);
	}

	public function saveObject() {
		global $SqlOp;
		$values = array($this->id, $this->groupid, $this->userid, $this->projectid);
		$result = $SqlOp->insertTo('Group_User', $values);
		if($result) {
			return $result;
		} else {
			$keys = array('groupid', 'userid', 'projectid');
			$values = array($this->groupid, $this->userid, $this->projectid);
			$result = $SqlOp->updateItem('Group_User', $keys, $values, 'id', $this->id);
			return $result;
		}
	}
}
?>
