<?php

require_once 'Model.php';
class User extends Model{
	$this->load('tools/m.php');
	$sqlop;
	public function __construct() {
		$sqlop = new SqlOp();
	}
	
	public function selectUserWithSearchKeyAndValue($key, $value) {
		$sqlop->connectTo();
		$result = $sqlop->selectItem("User",$key,$value);
		$sqlop->close();
		return $result;
	}
	
	public function insertUser($id,$account,$username,$password,$avatar,$email,$phone) {
		$valueArray = [$id, $account, $username, $password, $avatar, $email, $phone];
		$sqlop->connectTo();
		$result = $sqlop->insertTo("User", $valueArray);
		$sqlop->close();
		return $result;
	}

	public function deleteUserWithKeyAndValue($key, $value) {
		$sqlop->connectTo();
		$result = $sqlop->deleteItem("User",$key, $value);
		$sqlop->close();
		return $result;
	}
	
	public functions updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$sqlop->connectTo();
		$result = $sqlop->updateUser("User", $setKeys, $setValues, $searchKey, $searchValue);
		$sqlop-close();
		return $result;
	}	
}

?>
