<?php
/**
 * create by guoshencheng 2015
 **/
class Group extends model {
	public $id;
	public $groupname;
	public $updatetime;
	public $adminid;
	public $createrid;
	public $description;
	public function __construct() {
	}
	
	public function deleteObject() {
		global $SqlOp;
		return $SqlOp->deleteItem("`Group`", 'id', $this->id);
	}

	public function saveObject() {
		global $SqlOp;
		$values = array($this->id, $this->groupname, $this->updatetime, $this->adminid, $this->createrid, $this->description);
		$result = $SqlOp->insertTo("`Group`", $values);
		if ($result) {
			return $result;
		} else {
			$keys = array('groupname', 'updatetime', 'adminid', 'createrid', 'description');
			$values = array($this->groupname, $this->updatetime, $this->adminid, $this->createrid, $this->description);	
			return $SqlOp->updateItem("`Group`", $keys, $values, 'id', $this->id);
		}
	}

	public static function all() {
		global $SqlOp;
		$array = $SqlOp->selectAll("`Group`");
		return self::changeToObjectArray($array);	
	}

	public static function selectObjectWithId($id) {
		global $SqlOp;
		$array = $SqlOp->selectItem("`Group`", 'id', $id);
		return self::changeToObjectArray($array);
	}

	private static function changeToObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupname'], $array[$i]['updatetime'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description']));
		}
		return $objectArray;
	}

	private static function createObjectWith($id, $groupname, $updatetime, $adminid, $createrid, $description) {
		$object = new Group();
		$object->id = $id;
		$object->groupname = $groupname;
		$object->updatetime = $updatetime;
		$object->adminid = $adminid;
		$object->createrid = $createrid;
		$object->description = $description;
		return $object;
	}
}
?>
