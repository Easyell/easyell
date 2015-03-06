<?php
/**
	@name item
	@description just like task or needs as a item
	@author Leo Zhou
	@createtime 2015/1/27
	@updatetime 2014/2/24


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
	public $createDate;
	public $updateDate;

	//Struct
	public function __construct() {
		
	}

	//PublicMethod
	public function toArray() {
		return array(
			'id' => $id,
			'title' => $title,
			'description' => $description,
			'status' => $status,
			'posterId' => $posterId,
			'type' => $type,
			'projectId' => $projectId,
			'createDate' => $createDate,
			'updateDate' => $updateDate
		);
	}
	//Delete
	public function deleteObject(){
		global $SqlOp;
		$result = $SqlOp->deleteItem('Item','id',$this->id)&&$SqlOp->deleteItem('Item_User','itemId',$this->id);
		return $result;
	}
	//Save Or Update Object 
	public function saveObject(){
		global $SqlOp;
		$values = array($this->id, $this->description, $this->title,
					$this->status, $this->posterId, $this->type,
					$this->projectId,$this->createDate,$this->updateDate);
		var_dump($values);
		$result = $SqlOp->insertTo('Item',$values);
		var_dump($result);
		if($result){
			return $result;
		}else{
			$keys=array('title','description','status','posterId','type','projectId','updateDate');
			$values = array($this->title,$this->description,$this->status,$this->posterId,$this->type,$this->projectId,$this->updateDate);
			return $SqlOp->updateItem('Item',$keys,$values,'id',$this->id);
		}
	}
	//Select
	public static function all(){
		global $SqlOp;
		$array=$SqlOp->selectAll('Item');
		return self::changeToObjectArray($array);
	}
	public function selectObjectWithId($id){
		global $SqlOp;
		$array = $SqlOp->selectItem('Item','id',$id);
		return self::changeToObjectArray($array);
	}

	//primate Method 
	private static function changeToObjectArray($array) {
		$objectArray = array();
		for ($i = 0; $i < count($array); $i ++) {
			array_push($objectArray,  self::createObjectWith($array[$i]['id'], $array[$i]['title'], $array[$i]['description'], $array[$i]['projectid'], $array[$i]['posterid'], $array[$i]['type'], $array[$i]['status'], $array[$i]['createdate'], $array[$i]['updatedate']));
		}
		return $objectArray;
	}

	private static function createObjectWith($id,$title,$description,$projectId,$posterId,$type,$status,$createDate,$updateDate) {
		$object = new Item();
		$object->id = $id;
		$object->title = $title;
		$object->description = $description;
		$object->projectId = $projectId;
		$object->posterId = $posterId;
		$object->status = $status;
		$object->type = $type;
		$object->createDate = $createDate;
		$object->updateDate = $updateDate;


		return $object;
	}
}
?>
