<?php
/**
 * create by guoshencheng 2015
 **/
class Project extends Model {
	public $id;
	public $projectname;
	public $groupid;
	public $adminid;
	public $createrid;
	public $description;
	public $createdate;
	public $itemlist;
	public function __construct() {
	}
	
	public function toArray() {
		return array(
			"id" => $id,
			"projectname" => $projectname,
			"groupid" => $groupid,
			"adminid" => $adminid,
			"createrid" => $createrid,
			"description" => $description,
			"createdate" => $createdate		
		);
	}

	public static function selectObjectWithId($id) {
		global $SqlOp;
		$array = $SqlOp->selectItem('Project', 'id', $id);
		// var_dump(self::createObjectWith($array['0']['id'], $array['0']['projectname'], $array['0']['adminid'], $array['0']['createrid'], $array['0']['description'], $array['0']['createdate'], $array['0']['groupid']));
		// $objectArray = array();
		// for ($i = 0;$i < count($array); $i ++) {
		// 	array_push($objectArray, self::createObjectWith($array[$i]['id'], $array[$i]['projectname'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description'], $array[$i]['createdate'], $array[$i]['groupid']));			
		// }
		return self::createObjectWith($array['0']['id'], $array['0']['projectname'], $array['0']['adminid'], $array['0']['createrid'], $array['0']['description'], $array['0']['createdate'], $array['0']['groupid']);
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
