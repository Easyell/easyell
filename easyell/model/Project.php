<?php
class Project extends Model {
//Struct
	
	public function __construct() {
		$this->load('tools/SqlOp.php');
		$this->load('Group_User.php');
	}
	
//Public Method
	
//Select

	public static function selectProjectWithid($id) {
		return self::selectProjectWithSearchKeyAndValue("id", $id);	
	}
	
	public static function selectProjectWithName($name) {
		return self::selectProjectWithSearchKeyAndValue("projectname", $name);
	}

	public static function selectProjectWithGroupId($groupId) {
		return self::selectProjectWithSearchKeyAndValue("groupid", $groupId);
	}

	public static function selectProjectWithAdminId($adminId) {
		return self::selectProjectWithSearchKeyAndValue("adminid", $adminId);
	}

	public static function selectProjectWithCreaterId($createrId) {
		return self::selectProjectWithSearchKeyAndValue("createrid", $createrId);
	}

//Delete

	public function deleteProjectWithProjectId($id) {
		return self::deleteProject("id",$id);
	}

	public function deleteProjectWithProjectName($projectname) {
		return self::deleteProject("projectname", $projectname);
	}
	
	public function deleteProjectWithGroupId($groupId) {
		return self::deleteProject("groupid", $groupId);
	}

	public function deleteProjectWithAdminId($adminId) {
		return self::deleteProject("adminid", $adminId);
	}
	
	public function deleteProjectWithCreateId($createrId) {
		return self::deleteProject("createrid", $createrId);
	}

//Insert

	public static function insertProject($id, $projectname, $groupid, $adminid, $createrid, $description, $createdate) {
		$valueArray = array($id, $projectname, $groupid, $adminid, $createrid, $description, $createdate);
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->insertTo("Project", $valueArray);
		$sqlOp->close();
		return $result;
	}

//Update

	public static function updateProject($setKeys, $setValues, $searchKey, $searchValue) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->updateItem("Project",$setKeys, $setValues, $searchKey, $searchValue);
		$sqlOp->close();
		return $result;
	}

//Private Method

	private static function selectProjectWithSearchKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->selectItem("Project", $key, $value);
		$sqlOp->close();
		return $result;
	}
	
	private static function deleteProject($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->deleteItem("Project", $key, $value);	
		$sqlOp->close();
		return $result;
	}

}	
?>
