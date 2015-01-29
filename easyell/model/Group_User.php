<?php
class Group_User extends model{	
	public $id;
   	public $groupid;
	public $userid;
	public $projectid;
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	
//PublicMethod

//Select
	public static function selectGroup_UserWithId($id) {
		return self::selectGroup_UserWithKeyAndValue("id", $id);
	}
	
	public static function selectGroup_UserWithUserId($id) {
		return self::selectGroup_UserWithKeyAndValue("userid", $id);
	}

	public static function selectGroup_UserWithProjectId($id) {
		return self::selectGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public static function selectGroup_UserWithGroupId($id) {
		return self::selectGroup_UserWithKeyAndValue("groupid", $id);
	}	

//Delete

	public static function deleteGroup_UserWithId($id) {
		return self::deleteGroup_UserWithKeyAndValue("id", $id);
	}
	
	public static function deleteGroup_UserWithUserId($id) {
		return self::deleteGroup_UserWithKeyAndValue("userid", $id);
	}

	public static function deleteGroup_UserWithProjectId($id) {
		return self::eleteGroup_UserWithKeyAndValue("projectid", $id);
	}
	
	public static function deleteGroup_UserWithGroupId($id) {
		return self::deleteGroup_UserWithKeyAndValue("groupid", $id);
	}
	
//Insert
	public static function inserGroup_User($id, $groupid, $userid, $projectid) {
		$valueArray = array($id, $groupid, $userid, $projectid);
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->insertTo("Group_User", $valueArray);
		$sqlOp->close();
		return $result;
}

//Update

	public static function updateGroup_User($setKeys,$setValues,$searchKey,$searchValue) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->updateItem("Group_User", $setKeys,$setValues,$searchKey,$searchValue);
		$sqlOp->close();
		return $result;
	}

//PrivateMethod

	private static function selectGroup_UserWithKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->selectItem("Group_User", $key, $value);
		$sqlOp->close();
		return $result;
	}

	private static function deleteGroup_UserWithKeyAndValue($key, $value) {
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$result = $sqlOp->deleteItem("Group_User", $key, $value);
		$sqlOp->close();
		return $result;
	}

}
?>
