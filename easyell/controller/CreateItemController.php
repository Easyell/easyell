<?php
/**
	@name create item 
	@description Controller : create a item or update item
	@author Leo Zhou
	@createtime 2015/2/23
	@updatetime 2015/2/24
**/

class CreateItemController extends Controller{
	public function __constructr() {
		parent::__construct($isSql);
	}

	//add  :  {"title":"testtitle","description":"test item desctiption","status":"1","posterId":"1","type":"1","projectId":"1"}
	//update  :  {"id":"4","title":"testtitle","description":"test item desctiption","status":"1","posterId":"1","type":"1","projectId":"1"}
	public function set_param($param){
		$this->load('Item.php');
		var_dump(time());
		$item = new Item();
		if(!empty($param['id'])){
			$item->id = $param['id'];
		}
		$item->title = $param['title'];
		$item->description = $param['description'];
		$item->status = $param['status'];
		$item->posterId = $param['posterId'];
		$item->type = $param['type'];
		$item->projectId = $param['projectId'];
		$item->createDate = strval(time());
		$item->updateDate = strval(time());
		var_dump($item);
		if ($item->saveObject()) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}
}

?>