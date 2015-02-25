<?php
/**
	@name modify items
	@description Controller : modify a item 
	@author Leo Zhou
	@createtime 2015/2/24
	@updatetime 2014/2/24
**/
class ModifyItemController extends controller {
	public function __constructr(){
		parent::__construct($isSql);
	}

	//{"id":"5","title":"testtitle","description":"test%20item2%20createtime","status":"1","posterId":"1","type":"1","projectId":"1"}
	//{"id":"5","projectId":"2"}
	public function set_param($param){
		$result = 'success';
		$this->load('Item.php');
		$item = new Item();
		$item = $item->selectObjectWithId($param['id']);
		$item = $item['0'];
		//逐个判空赋值
		if(!empty($param['title'])) {
			$item->title = $param['title'];
		}
		if(!empty($param['description'])) {
			$item->description = $param['description'];
		}
		if(!empty($param['status'])) {
			$item->status = $param['status'];
		}
		if(!empty($param['posterId'])) {
			$item->posterId = $param['posterId'];
		}
		if(!empty($param['type'])) {
			$item->type = $param['type'];
		}
		if(!empty($param['projectId'])) {
			//判断 该 project 是否存在
			$this->load('Project.php');
			$project = Project::selectObjectWithId($param['projectId']);
			if($project){
				$item->projectId = $param['projectId'];
			}else {
				$result = 'fail';
			}
		}
		//更新 item 更新时间
		$item->updateDate = strval(time());
		if($result == 'success' && $item->saveObject()) {
			$result = 'success';
		}else{
			$result = 'fail';
		}
		echo $result;
	}
}