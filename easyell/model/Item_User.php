<?php
/**
	@name item_user
	@description item and user mapping
	@author Leo Zhou
	@createtime 2015/1/29
	@updatetime 2014/2/18


**/

class Item_User extends model{
	//params
	public $id;
	public $itemId;
	public $userId;

	public function __construct() {
	}
	
	public function toArray() {
		return array(
			"id" => $id,
			"itemId" => $itemId,
			"userId" => $userId,
		);
	}

	//PublicMethod
	public static function selectObjectWithId($id){
		global $SqlOp;
		$array = $SqlOp->selectItem('Item_User','id',$id);
		return self::changeToObjectArray($array);
	}

	//selectAll

	//Delet
	public function deleteObject(){
		global $SqlOp;
		return $SqlOp->deleteItem('Item_User','id',$this->id);
	}

	//Save 
	public function saveObject(){
		global $SqlOp;
		$values = array($this->id,$this->itemId,$this->userId);
		$result = $SqlOp->insertTo('Item_User',$values);
		if($result){
			return $result;
		} else {
			$keys = array('itemId','userId');
			$values = array($this->itemId,$this->userId);
			$result = $SqlOp->updateItem('Item_User',$keys,$values,'id',$this->id);
			return $result;
		}
	}

	//private 
	private static function createObjectWith($id,$itemId,$userId){
		$object = new Item_User();
		$object->id = $id;
		$object->itemId = $itemId;
		$object->userId = $userId;
		return $object;
	}

	private static function changeToObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupname'], $array[$i]['updatetime'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description']));
		}
		return $objectArray;
	}

	
}
?>
