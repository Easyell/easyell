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
	public $ownerId;

	public function __construct() {
	}
	
	public function toArray() {
		return array(
			"id" => $id,
			"itemId" => $itemId,
			"ownerId" => $ownerId,
		);
	}

	//PublicMethod
	public static function selectObjectWithId($id){
		global $SqlOp;
		$array = $SqlOp->selectItem('Item_User','id',$id);
		return self::changeToObjectArray($array);
	}

	public static function selectObjectWithUserId($ownerId){
		global $SqlOp;
		$array = $SqlOp->selectItem('Item_User','ownerid',$ownerId);
		// return self::changeToObjectArray($array);
		return $array;
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
		$values = array($this->id,$this->itemId,$this->ownerId);
		$result = $SqlOp->insertTo('Item_User',$values);
		if($result){
			return $result;
		} else {
			$keys = array('itemId','ownerId');
			$values = array($this->itemId,$this->ownerId);
			$result = $SqlOp->updateItem('Item_User',$keys,$values,'id',$this->id);
			return $result;
		}
	}

	//private 
	private static function createObjectWith($id,$itemId,$ownerId){
		$object = new Item_User();
		$object->id = $id;
		$object->itemId = $itemId;
		$object->ownerId = $ownerId;
		return $object;
	}

	private static function changeToObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['itemId'], $array[$i]['ownerId']));
		}
		return $objectArray;
	}

	
}
?>
