<?php
/**
	@name item
	@description just like task or needs as a item
	@author Leo Zhou
	@createtime 2015/1/27
	@updatetime 2014/2/15


**/

class Item extends Model {
	//public params
	public $id;
	public $title;
	public $description;
	public $status;
	public $posterId;
	public $type;
	public $projectId;

	//Struct
	public function __construct() {
		
	}

	//PublicMethod

	//Delete
	public function deleteObject(){
		global $SqlOp;
		return $SqlOp->deleteItem("`Item`",'id',$this->id);
	}
	//Save Or Update Object 
	public function saveObject(){
		global $SqlOp;
		$values = array($this->id,$this->title,$this->description,
					$this->status,$this->posterId,$this->type,
					$this->projectId);
		$result = $SqlOp->insertTo("`Item`",$values);
		if($result){
			return $result;
		}else{
			$keys=array('title','description','status','posterId','type','projectId');
			$values = array($this->title,$this->description,$this->status,$this->posterId,$this->type,$this->projectId);
			return $SqlOp->updateItem("`Item`",$keys,$values,'id',$this->id);
		}
	}
	//Select
	public static function all(){
		global $SqlOp;
		$array=$SqlOp->selectAll("`Item`");
		return self:changeToObjectArray($array);
	}
	public function selectObjectWithId($id){
		global $SqlOp;
		$array = $SqlOp->selectItem("`Item`",'id',$id);
		return self:changeToObjectArray($array);
	}

	//primate Method 
	private static function changeToObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['groupname'], $array[$i]['updatetime'], $array[$i]['adminid'], $array[$i]['createrid'], $array[$i]['description']));
		}
		return $objectArray;
	}

	private static function createObjectWith($id,$title,$description,$projectId,$posterId,$type,$status) {
		$object = new Item();
		$object->id = $id;
		$object->title = $title;
		$object->description = $description;
		$object->projectId = $projectId;
		$object->posterId = $posterId;
		$object->status = $status;
		$object->type = $type;
		return $object;
	}
}
?>