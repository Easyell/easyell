<?php
class Project extends Model {
//Struct
	
	public function __construct() {
		$this->load('tools/SqlOp.php');
		$this->load('Group_User.php');
	}
	
//Public Method
	
//Select

	public function selectProjectWithid($id) {
		return $this->selectProjectWithSearchKeyAndValue("id", $id);	
	}
	
	public function selectProjectWithName($name) {
		return $this->selectProjectWithSearchKeyAndValue("projectname", $name);
	}

	public function selectProjectWithGroupId($groupId) {
		return $this->selectProjectWithSearchKeyAndValue("groupid", $groupId);
	}

	public function selectProjectWithAdminId($adminId) {
		return $this->selectProjectWithSearchKeyAndValue("adminid", $adminId);
	}

	public function selectProjectWithCreateId($createrId) {
		return $this->selectProjectWithSearchKeyAndValue("createrid", $createrId);
	}

//Delete

	public function deleteProjectWithProjectId($id) {
		return ($this->deleteProject("id",$id) && $this->group_user->deleteGroup_UserWithId($id));
	}

	public function deleteProjectWithProjectName($projectname) {
		return $this->deleteProject("projectname", $projectname);
	}
	
	public function deleteProjectWithGroupId($groupId) {
		return $this->deleteProject("groupid", $groupId);
	}

	public function deleteProjectWithAdminId($adminId) {
		return $this->deleteProject("adminid", $adminId);
	}
	
	public function deleteProjectWithCreateId($createrId) {
		return $this->deleteProject("createrid", $createrId);
	}

//Insert

	public function insertProject($id, $projectname, $groupid, $adminid, $createrid, $description, $createdate) {
		$valueArray = array($id, $projectname, $groupid, $adminid, $createrid, $description, $createdate);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("Project", $valueArray);
		$this->sqlop->close();
		return $result;
	}

//Update

	public function updateProject($setKeys, $setValues, $searchKey, $searchValue) {
		$this->sqlop->connectTo();
		$result =$this->sqlop->updateItem("Project",$setKeys, $setValues, $searchKey, $searchValue);
		$this->sqlop->close();
		return $result;
	}

//Private Method

	private function selectProjectWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Project", $key, $value);
		$this->sqlop->close();
		return $result;
	}
	
	private function deleteProject($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("Project", $key, $value);	
		$this->sqlop->close();
		return $result;
	}

}	
?>
