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
	//--all
	//	$this->SqlOp->connectTo();
	 //	echo json_encode($this->SqlOp->selectAll('Group_User'));
	//	$this->SqlOp->close();
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
		//$this->load('Group_User.php');
		/**
		$object = new Group_User();
		$object->id = 1;
		$object->groupid = 2;
		$object->userid = 2;
		$object->projectid = 0;
		$this->testBoolValue($object->saveObject());
		**/
	   	/**
	   	$sqlOp = new SqlOp();
	   	$sqlOp->connectTo();
	   	$array = Group_User::selectObjectWithId(1, $sqlOp);
		$this->testBoolValue($array[0]->saveObject());
		$this->testBoolValue($array[0]->saveObject());
	   	**/
///////////////////////////////////////////////////
		$this->load('Project.php');
		/**
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$array = Project::all($sqlOp);
		//$array = Project::selectObjectWithId(1, $sqlOp);
		echo json_encode($array[0]->id);
		$sqlOp->close();
		**/
/////////////////////////////////////////////////////////
		$this->load('User.php');
		
		$sqlOp = new SqlOp();
		$sqlOp->connectTo();
		$array = User::all($sqlOp);
		echo json_encode($array[0]->id);
		$sqlOp->close();
	}

	private function testBoolValue($bool) {
		if($bool) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}
}
