<?php
class Project extends Model {
//Struct
	
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	
//Public Method
	
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

	public function selectProjectWithCreateId($createId) {
		return $this->selectProjectWithSearchKeyAndValue("createid", $createId);
	}

	public function insertProject($id, $projectname, $groupid, $adminid, $createrid, $description, $createdate) {
		return $this->sqlop->insertTo("Project",$id, $projectname, $groupid, $adminid, $createrid, $description, $createdate);
	}
	
	
//Private Method

	private function selectProjectWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Project", $key, $value);
		$this->sqlop->close();
		return $result;
	}
}	
?>
