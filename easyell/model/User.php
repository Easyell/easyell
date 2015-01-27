<?php

class User extends Model{
	public function __construct() {
		$this->load('tools/SqlOp.php');
		$this->load('Group_User.php');
	}

//Public Method

	public function insertUser($id,$account,$username,$password,$avatar,$email,$phone) {
		$valueArray = array($id, $account, $username, $password, $avatar, $email, $phone);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("User", $valueArray);
		$this->sqlop->close();
		return $result;
	}

	public function updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->updateUser("User", $setKeys, $setValues, $searchKey, $searchValue);
		$this->sqlop-close();
		return $result;
	}	

	public function selectUserWithId($id) {
		return $this->selectUserWithSearchKeyAndValue('id', $id);
	}

	public function selectUserWithAcount($account) {
		return $this->selectUserWithSearchKeyAndValue('account', $account);
	}

	public function selectUserWithUsername($username) {
		return $this->selectUserWithSearchKeyAndValue('username', $username);
	}

	public function deleteUserWithId($id) {
		return ($this->deleteUserWithKeyAndValue('id', $id) && $this->group_user->deleteGroup_UserWithUserId($id));
	}

	public function deleteUserWithAccount($account) {
		return $this->deleteUserWithKeyAndValue('account', $account);
	}

	public function deleteUserWithUsername($username) {
		return $this->deleteUserWithKeyAndValue('username', $username);
	}

//Private Method

	private function selectUserWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("User",$key,$value);
		$this->sqlop->close();
		return $result;
	}

	private function deleteUserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("User",$key, $value);
		$this->sqlop->close();
		return $result;
	}
}

?>
