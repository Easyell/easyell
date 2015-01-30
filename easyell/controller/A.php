<?php
//这是一个示例文件，没点屁用
class A extends Controller{

	private $name = 'A';
	
	public function __constructr(){
		
	}

	public function set_param(){
///////Test for SqlOp.php///////////////////////////////
	//--load;
	//	$this->load('tools/SqlOp.php');
	//--connectTo();
		//if($this->SqlOp->connectTo()) {
			//echo "success";
		//} else {
			//echo 'not success';
		//}
	//--insert
		//$array = array(7, 'guoshencheng7', 'guoshencheng7', '123456', 'avatar', 'email', '1111111111');
		//$this->SqlOp->insertTo('User', $array);
	//--delete
		//$this->SqlOp->deleteItem("User",'id', 7);
		//echo "delete finish</br>";
	//--update
		//$keys = array('username','account');
		//$values = array('zhouyunge', 'zhouyunge');
		//if ($this->SqlOp->updateItem('User', $keys, $values, 'id', 7)) {
			//echo 'update finish</br>';
		//} else {
			//echo $this->SqlOp->getUpdateSqlString('User', 'username', 'zhouyunge', 'id', 7);
		//}	
	//--select
		//echo json_encode($this->SqlOp->selectItem("User",'id', 7));
///////////////////////////////////////////////////////Group_User.php Test
	//	$this->load('Group_User.php');
	//	Group_User::inserGroup_User('9', '2', '2', 0);
	//	Group_User::inserGroup_User('8', '2', '2', '');
		//Group_User::deleteGroup_UserWithId(7);
	 //	$result1 = Group_User::selectGroup_UserWithId(7);
	 	//$keys = array('groupid', 'projectid');
		//$values = array(1,0);
		//Group_User::updateGroup_User($keys, $values, 'id', 9);
		//echo json_encode($result1);
		//$object = Group_User::selectObjectWithId(9);
		//echo 'id:'.$object->id.'</br>';
		//echo 'groupid'.$object->groupid.'</br>';
		//$object->deleteObject();
		//$result2 = Group_User::selectGroup_UserWithId(9);
		//echo json_encode($result2);
///////////////////////////////////////////////////
	//$this->load('Project.php');
	
	}
}
