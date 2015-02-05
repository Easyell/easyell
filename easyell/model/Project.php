<?php
class Project extends Model {
	public $id;
	public $projectname;
	public $groupid;
	public $adminid;
	public $createrid;
	public $description;
	public $createdate;
	public function __construct() {
	}
	
	public static function selectObjectWithId($id) {
		global $SqlOp;
		$array = $SqlOp->selectItem('Project', 'id', $id);
		$objectArray = array();
		for ($i = 0;$i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'], $array[$i]['projectname'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description'], $array[$i]['createdate'], $array[$i]['groupid']));			
		}
		return $objectArray;
	}

	public static function all() {
		global $SqlOp;
		$array = $SqlOp->selectAll('Project');
		$objectArray = array();
		for ($i = 0;$i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'], $array[$i]['projectname'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description'], $array[$i]['createdate'], $array[$i]['groupid']));		
		}
		return $objectArray;
	}

	public function saveObject() {
		global $SqlOp;
		$values = array($this->id, $this->projectname, $this->groupid, $this->adminid, $this->createrid, $this->description, $this->createdate);
		$result = $SqlOp->insertTo('Project', $values);
		if($result) {
			return $result;
		} else {
			$keys = array('projectname', 'groupid', 'adminid', 'createrid', 'description', 'createdate');
			$values = array($this->projectname, $this->groupid, $this->adminid, $this->createrid, $this->description, $this->createdate);
			$result = $SqlOp->updateItem('Project', $keys, $values, 'id', $this->id);
			return $result;
		}
	}	
	
	public function deleteObject() {
		global $SqlOp;
		return $SqlOp->deleteItem('Project', 'id', $this->id);
	}
	
	private static function createObjectWith($id, $projectname, $adminid, $createrid, $description, $createdate, $groupid) {
		$object = new Project();
		$object->id = $id;
		$object->projectname = $projectname;
		$object->adminid = $adminid;
		$object->createrid = $createrid;
		$object->description = $description;
		$object->createdate = $createdate;
		$object->groupid = $groupid;
		return $object;
	}
}	
?>
