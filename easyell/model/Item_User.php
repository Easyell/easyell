<?php
/**
	@name item_user
	@description item and user mapping
	@author Leo Zhou
	@createtime 2015/1/29
	@updatetime 2014/1/29


**/

class Item_User extends model{
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}

	//PublicMethod

	//Select
	public function selectItem_UserWithId($id){
		$this->selectItem_UserWithKeyAndValue("id",$id);
	}

	public function selectItem_UserWithUserId($userId){
		$this->selectItem_UserWithKeyAndValue("ownerid",$userId);
	}

	public function selectIte_UserWithItemId($itemId) {
		$this->selectItem_UserWithKeyAndValue("itemid",$itemId);
	}

	//Delete 

	public function deleteItem_UserWithId($id){
		$this->deleteItem_UserWithKeyAndValue("id",$id);
	}

	public function deleteItem_UserWithUserId($userId){
		$this->deleteItem_UserWithKeyAndValue("ownerid",$userId);
	}

	public function deleteIte_UserWithItemId($itemId) {
		$this->deleteItem_UserWithKeyAndValue("itemid",$itemId);
	}

	//insert
	public function inserItem_User($id, $itemId, $ownerId) {
		$valueArray = array($id, $itemId, $ownerId);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("Item_User", $valueArray);
		$this->sqlop->close();
		return $result;
	}

	//update
	public function updateItem_User($setKeys,$setValues,$searchKey,$searchValue) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->updateItem("Item_User", $setKeys,$setValues,$searchKey,$searchValue);
		$this->sqlop->close();
		return $result;
	}


	//privateMethod
	private function selectItem_UserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Item_User", $key, $value);
		$this->close();
		return $result;
	}

	private function deleteItem_UserWithKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("Item_User", $key, $value);
		$this->close();
		return $result;
	}
}




?>