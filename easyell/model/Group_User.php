<?php
class Group_User {	
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	
//PublicMethod

//Select
	public function selectGroup_UserWithId($id) {
		$this->selectGroup_UserWithKeyAndValue("id", $id);
	}
	
	public function selectGroup_UserWithUserId($id) {
		$this->selectGroup_UserWithKeyAndValue("userid", $id);
	}

	public function selectGroup_UserWithProjectId($id) {
		$this->selectGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public function selectGroup_UserWithGroupId($id) {
		$this->selectGroup_UserWithKeyAndValue("groupid", $id);
	}	

//Delete

	public function deleteGroup_UserWithId($id) {
		$this->deleteGroup_UserWithKeyAndValue("id", $id);
	}
	
	public function deleteGroup_UserWithUserId($id) {
		$this->deleteGroup_UserWithKeyAndValue("userid", $id);
	}

	public function deleteGroup_UserWithProjectId($id) {
		$this->deleteGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public function deleteGroup_UserWithGroupId($id) {
		$this->deleteGroup_UserWithKeyAndValue("groupid", $id);
	}
	
//Insert
	public function inserGroup_User($id, $groupid, $userid, $projectid) {
		$valueArray = array($id, $groupid, $userid, $projectid);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("Project", $valueArray);
		$this->sqlop->close();
		return $result;
	}

//Update

	public function updateGroup_User($setKeys,$setValues,$searchKey,$searchValue) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->updateItem("Project", $setKeys,$setValues,$searchKey,$searchValue);
		$this->sqlop->close();
		return $result;
	}

//PrivateMethod

	private function selectGroup_UserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Project", $key, $value);
		$this->close();
		return $result;
	}

	private function deleteGroup_UserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("Project", $key, $value);
		$this->close();
		return $result;
	}

}
?>
