<?php
class Group_User extends model{	
	public $id;
   	public $groupid;
	public $userid;
	public $projectid;
	public function __construct() {
		$this->load('db/SqlOp.php')
		$this->SqlOp->connectTo();
	}
	
// PublicMethodi
	public static function selectObjectWithId($id, &$sqlOp) {
		$array = $sqlOp->selectItem('Group_User', 'id', $id);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}
	
	public static function all(&$sqlOp) {
		$array = self::selectAll($sqlOp);
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupid'], $array[$i]['userid'], $array[$i]['projectid']));
		}
		return $objectArray;
	}

	public static function selectAll(&$sqlOp) {
		$result = $sqlOp->selectAll('Group_User');
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
}
?>
