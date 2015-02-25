<?php
/**
	@name Add Item Owner Controller
	@description add a record in Item_User table
	@author Leo Zhou
	@createtime 2015/2/24
	@updatetime 2014/2/24


**/

class AddItemOwnerController extends Controller {
	public function __constructr(){
		parent::__construct($isSql);
	}

	public function set_param($param){
		$this->load('Item_User.php');
		$record = new Item_User();
		$record->itemId = $param['itemId'];
		$record->userId = $param['userId'];
		if($record->saveObject()){
			echo 'success';
		}else {
			echo 'fail';
		}
	}
}
