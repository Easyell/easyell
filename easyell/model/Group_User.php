<?php
class Group_User extends model{	
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	
//PublicMethod
 	public static function out() {
		echo 1;
	}
//Select
	public function selectGroup_UserWithId($id) {
		return $this->selectGroup_UserWithKeyAndValue("id", $id);
	}
	
	public function selectGroup_UserWithUserId($id) {
		return $this->selectGroup_UserWithKeyAndValue("userid", $id);
	}

	public function selectGroup_UserWithProjectId($id) {
		return $this->selectGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public function selectGroup_UserWithGroupId($id) {
		return $this->selectGroup_UserWithKeyAndValue("groupid", $id);
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
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->insertTo("Project", $valueArray);
		$this->SqlOp->close();
		return $result;
	}

//Update

	public function updateGroup_User($setKeys,$setValues,$searchKey,$searchValue) {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->updateItem("Project", $setKeys,$setValues,$searchKey,$searchValue);
		$this->SqlOp->close();
		return $result;
	}

//PrivateMethod

	private function selectGroup_UserWithKeyAndValue($key, $value) {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->selectItem("Project", $key, $value);
		$this->SqlOp->close();
		return $result;
	}

	private function deleteGroup_UserWithKeyAndValue($key, $value) {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->deleteItem("Project", $key, $value);
		$this->close();
		return $result;
	}

}
?>
