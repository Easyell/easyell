<?php
class Group_User {	
	public function __construct() {
		$this->load('tools/SqlOp.php');
	}
	
//PublicMethod




//PrivateMethod

	private function selectGroup_UserWithValueAndKey($value, $key) {
		$this->sqlop->connectTo();
		$result = $this->sqlop->selectItem("Project", $value, $key);
		$this->close();
		return = $result;
	}

}
?>
