<?php
//这是一个示例文件，没点屁用
class A extends Controller{

	private $name = 'A';
	
	public function __constructr(){
		
	}

	public function set_param(){
///////Test for SqlOp.php///////////////////////////////
	//--load;
	// 	$this->load('tools/SqlOp.php');
	//--all
	//	$this->SqlOp->connectTo();
	//  echo json_encode($this->SqlOp->selectAll('Group_User'));
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
		//$array = Group_User::all();
		//for($i = 0;$i < count($array); $i ++) {
		//	echo json_encode($array[$i]);
		//}
	//	echo json_encode(Group_User::selectAll());
		//if(Group_User::inserGroup_User('7', '2', '2', 0)) {
		//	echo 'true';
		//} else {
		//	echo 'false';
		//}
	//	Group_User::inserGroup_User('8', '2', '2', '');
		//Group_User::deleteGroup_UserWithId(7);
	 //	$result1 = Group_User::selectGroup_UserWithId(7);
	 	//$keys = array('groupid', 'projectid');
		//$values = array(1,0);
		//Group_User::updateGroup_User($keys, $values, 'id', 9);
		//echo json_encode($result1);
		//echo 1;
		//$object = Group_User::selectObjectWithId(9)[0];
		//echo 'id:'.$object->id.'</br>';
		//echo 'groupid'.$object->groupid.'</br>';
		//$object->deleteObject();
		//$result2 = Group_User::selectGroup_UserWithProjectId(1);
		//echo json_encode($result2);
		//$object = new Group_User();
		//$object->id = 14;
		//$object->groupid = 0;
		//$object->userid = 1;
		//$object->projectid = 2;
		//$object->saveObject();
		
///////////////////////////////////////////////////
		//$this->load('Project.php');
		//$this->testBoolValue(Project::insertProject(3,'threeproject',1,2,2,'threethree', 111000111));
		//$this->testBoolValue(Project::deleteProjectWithProjectId(3));
		//$this->testBoolValue(Project::deleteProjectWithProjectName('threeproject'));
		//$keys = array('description', 'createdate');
		//$values = array('three project, three project', '222222222');
		//$this->testBoolValue(Project::updateProject($keys, $values, 'id', 3));
		//echo json_encode(Project::selectProjectWithid(1));
		//echo json_encode(Project::selectProjectWithName('threeproject'));
		//echo json_encode(Project::selectProjectWithGroupId(1));
		//echo json_encode(Project::selectProjectWithAdminId(1));
		//echo json_encode(Project::selectProjectWithCreaterId(1));
	
/////////////////////////////////////////////////////////
		$this->load('User.php');
		$this->testBoolValue(User::insertUser(6, 'guoshencheng1', 'guoshencheng1','123456', 'afadagagre', 'andna@akak.com', '959595919191'));
		//$this->testBoolValue(User::deleteUserWithId(6));
		//$this->testBoolValue(User::deleteUserWithUsername('guoshencheng1'));
		$this->testBoolValue(User::deleteUserWithAccount('guoshencheng1'));
		//$keys = array('username', 'password');
		//$values = array('guoshencheng2', '234567');
		//$this->testBoolValue(User::updateUser($keys, $values, 'id', 6));
		//User::deleteModel();
		echo json_encode(User::selectUserWithId(6));
		//echo json_encode(User::selectUserWithAcount('guoshencheng'));
		//echo json_encode(User::selectUserWithUsername('guoshencheng'));
	}

	private function testBoolValue($bool) {
		if($bool) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}
}
