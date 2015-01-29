<?php
/**
	@name item
	@description just like task or needs as a item
	@author Leo Zhou
	@createtime 2015/1/27
	@updatetime 2014/1/28


**/

class Item extends Model {
	//Struct

	public function __construct() {
		$this->load('tools/SqlOp.php');
	}

	//PublicMethod

	//Select
	public function selectItemWithItemId($itemId){
		return $this->selectItemWithSearchKeyAndValue("itemid", $itemId);
	}

	public function selectItemWithTitle($title) {
		return $this->selectItemWithSearchKeyAndValue("title", $title);
	}

	public function selectItemWithStatus($status) {
		return $this->selectItemWithSearchKeyAndValue("status", $status);
	}

	public function selectItemWithPosterId($posterId) {
		return $this->selectItemWithSearchKeyAndValue("posterid", $posterId);
	}

	public function selectItemWithType($type) {
		return $this->selectItemWithSearchKeyAndValue("type",$type);
	}

	public function selectItemWithProjectId($projectId) {
		return $this->selectItemWithSearchKeyAndValue("projectid",$projectId);
	}

	//Delete 
	public function deleteItemWithItemId($itemId){
		return ($this->deleteItemWithSearchKeyAndValue("itemid", $itemId));
	}

	public function deleteItemWithTitle($title){
		return ($this->deleteItemWithSearchKeyAndValue("title", $title));
	}

	public function deleteItemWithPosterId($posterId) {
		return $this->deleteItemWithSearchKeyAndValue("posterid",$posterId);
	}

	public function deleteItemWithProjectId($projectId) {
		return $this->deleteItemWithSearchKeyAndValue("projectid",$projectId);
	}

	//Insert
	public function insertItem($itemId,$title,$description,$projectId,$posterId,$type,$status){
		$valueArray = array($itemId,$title,$description,$projectId,$posterId,$type,$status);
		$this->sqlop->connectTo();
		$result = $this->sqlop->insertTo("Item",$valueArray);
		$this->sqlop->close();
		return $result;
	}

	//update
	public function updateItem($setKeys, $setValues, $searchKey, $searchValue){
		$this->sqlop->connectTo();
		$result =$this->sqlop->updateItem("Item",$setKeys, $setValues, $searchKey, $searchValue);
		$this->sqlop->close();
		return $result;
	}

	//Private Method
	private function selectItemWithSearchKeyAndValue($key, $value){
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Item", $key, $value);
		$this->sqlop->close();
		return $result;
	}

	private function deleteItemWithSearchKeyAndValue($key, $value) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->deleteItem("Item", $key, $value);	
		$this->sqlop->close();
		return $result;
	}
}
?>