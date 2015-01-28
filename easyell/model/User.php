<?php
class User extends Model{
		
	$id;
	$account;
	$username;
	$password;
	$avatar;
	$email;
	$phone;
	function __construct() {
		$this->load('tools/SqlOp.php');
		//$this->load('Group_User.php');
	}

//Public Method
	public function insertUser($id,$account,$username,$password,$avatar,$email,$phone) {
		$valueArray = array($id, $account, $username, $password, $avatar, $email, $phone);
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->insertTo("User", $valueArray);
		$this->SqlOp->close();
		return $result;
	}

	public function updateUser($setKeys, $setValues, $searchKey, $searchValue) {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->updateItem("User", $setKeys, $setValues, $searchKey, $searchValue);
		$this->SqlOp->close();
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

	public function deleteModel() {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->deleteItem("User", 'id',$this->id);
		$this->SqlOp->close();
		return $result;	
	}

//Private Method

	private function selectUserWithSearchKeyAndValue($key, $value) {
		$this->SqlOp->connectTo();
		$result = $this->SqlOp->selectItem("User",$key,$value);
		$this->SqlOp->close();
		return $result;
	}
?>
