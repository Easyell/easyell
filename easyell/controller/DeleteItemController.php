<?php
/**
	@name delete item 
	@description Controller : delete a item 
	@author Leo Zhou
	@createtime 2015/2/23
	@updatetime 2014/2/24
**/
class DeleteItemController extends controller{
	public function __constructr() {
		parent::__construct($isSql);
	}

	//{"id":"11"}
	public function set_param($param) {
		$result = 'success';
		$this->load('Item.php');
		$item = new Item();
		if(!empty($param['id'])){
			$item->id = $param['id'];
			$result = $item->deleteObject();		
		}else{
			$result = 'empty id. ';
		}
		echo $result;	
	}
}