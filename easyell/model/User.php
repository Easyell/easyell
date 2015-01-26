<?php

class User extends Model{
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	public function selectUserWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlopop->selectItem("User",$key,$value);
		$this->sqlopop->close();
		return $result;
	}
	
	public function insertUser($id,$account,$username,$password,$avatar,$email,$phone) {
		$valueArray = array($id, $account, $username, $password, $avatar, $email, $phone);
		$this->sqlopop->connectTo();
		$result = $this->sqlopop->insertTo("User", $valueArray);
		$this->sqlopop->close();
		return $result;
	}

	public function deleteUserWithKeyAndValue($key, $value) {
		$this->sqlopop->connectTo();
		$result = $this->sqlopop->deleteItem("User",$key, $value);
		$this->sqlopop->close();
		return $result;
	}
	
	public function updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$this->sqlopop->connectTo();
		$result = $this->sqlopop->updateUser("User", $setKeys, $setValues, $searchKey, $searchValue);
		$this->sqlopop-close();
		return $result;
	}	
}

?>
