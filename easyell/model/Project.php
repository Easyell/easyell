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
		$this->load('db/SqlOp.php');
		$this->SqlOp->connectTo();
	}
	
	public static function selectObjectWithId($id, &$sqlOp) {
		$array = $sqlOp->selectItem('Project', 'id', $id);
		$objectArray = array();
		for ($i = 0;$i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'], $array[$i]['projectname'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description'], $array[$i]['createdate'], $array[$i]['groupid']));			
		}
		return $objectArray;
	}

	public static function all(&$sqlOp) {
		$array = $sqlOp->selectAll('Project');
		$objectArray = array();
		for ($i = 0;$i < count($array); $i ++) {
			array_push($objectArray, self::createObjectWith($array[$i]['id'], $array[$i]['projectname'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description'], $array[$i]['createdate'], $array[$i]['groupid']));		
		}
		return $objectArray;
	}

	public function saveObject() {
		$this->SqlOp->connectTo();
		$values = array($this->id, $this->projectname, $this->groupid, $this->adminid, $this->createrid, $this->description, $this->createdate);
		$result = $this->SqlOp->insertTo('Project', $values);
		if($result) {
			$this->SqlOp->close();
			return $result;
		} else {
			$keys = array('projectname', 'groupid', 'adminid', 'createrid', 'description', 'createdate');
			$values = array($this->projectname, $this->groupid, $this->adminid, $this->createrid, $this->description, $this->createdate);
			$result = $this->SqlOp->updateItem('Project', $keys, $values, 'id', $this->id);
			$this->SqlOp->close();
			return $result;
		}
	}	
	
	public function deleteObject() {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->deleteItem('Project', 'id', $this->id);
		$this->SqlOp->close();
		return $result;	
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
