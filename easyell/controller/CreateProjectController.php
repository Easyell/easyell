<?php
/**
 * create by guoshencheng 2015.2.13
 **/
class CreateProjectController extends Controller {
	public function __constructr() {
		parent::__construct($isSql);
	}	
	//{"projectname":"testproject","groupid":"1","adminid":"1","createrid":"1"}
	public function set_param($paramString) {
		$param = $this->getDecodeObject($paramString);
		$this->load('Project.php');
		$project = new Project();
		$project->projectname = $param['projectname'];
		$project->groupid = $param['groupid'];
		$project->adminid = $param['adminid'];
		$project->createrid = $param['createrid'];
		$project->description = $param['description'];
		$project->createdate = '10000101';
		if ($project->saveObject()) {
			echo 'success';
		} else {
			echo 'fail';
		}
	}
}
?>
