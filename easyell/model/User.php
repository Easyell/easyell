<?php

class User extends Model{
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	public function selectUserWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("User",$key,$value);
		$this->sqlop->close();
		return $result;
	}
	
	public function insertUser($id,$account,$username,$password,$avatar,$email,$phone) {
		$valueArray = array($id, $account, $username, $password, $avatar, $email, $phone);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("User", $valueArray);
		$this->sqlop->close();
		return $result;
	}

	public function deleteUserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("User",$key, $value);
		$this->sqlop->close();
		return $result;
	}
	
	public function updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->updateUser("User", $setKeys, $setValues, $searchKey, $searchValue);
		$this->sqlop-close();
		return $result;
	}	
}

?>
