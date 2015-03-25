<?php
/**
	@name get User's Groups
	@description get Groups by UserId
	@author Leo Zhou
	@CreateTime 2015/3/18
	@updateTime 2015/3/18
**/
//require_once BASEPATH.'/lib/tool.php';

class GetUserGroupController extends Controller{
	public function __constructr(){
		parent::__construct($isSql);
	}

//fn=3009&param={%22userId%22:%221%22}
	public function set_param($param){
		$this->load('User.php');
		$this->load('Item.php');
		$this->load('Group.php');
		$this->load('Project.php');
		$this->load('Group_User.php');
		$this->load('Item_User.php');

		$user = new User();
		if(!empty($param['userId'])){
			$user->id = $param['userId'];
		}else{
			echo 'no userID';
			exit();
		}

		$userItem = new Item_User();
		$userItem->userId = $param['userId'];
		$items = $userItem->selectObjectWithUserId($userItem->userId);

		// var_dump($items);

		$getUserItems = array();
		foreach ($items as $item ) {
			array_push($getUserItems,$item['itemid']);
		}

		$itemobj = new Item();
		for ($i=0; $i < sizeof($getUserItems); $i++) { 
			$itemId = $getUserItems[$i];
			$getUserItems[$i]=$itemobj->selectObjectWithId($itemId);
		}

		// var_dump($getUserItems);

		$getItemProjectIds = array();
		$getItemProjectsMap = array();
		foreach ($getUserItems as $itemObj) {

			if(!in_array($itemObj[0]['projectId'],$getItemProjectIds)){
				array_push($getItemProjectIds,$itemObj[0]['projectId']);
				$getItemProjectsMap[$itemObj[0]['projectId']][0]=$itemObj[0]['id'];
			}else{
				array_push($getItemProjectsMap[$itemObj[0]['projectId']],$itemObj[0]['id']);
			}
		}

		// var_dump($getItemProjectsMap);
		// var_dump($getItemProjectIds);

		$getItemProjects = array();
		$project = new Project();
		foreach ($getItemProjectIds as $itemProjectId) {
			
			$getItemProjects[$itemProjectId] = $project->selectObjectWithId($itemProjectId);
			// array_push($getItemProjects, $project->selectObjectWithId($itemProjectId));
		}

		// var_dump($getItemProjects);

		$getProjectGroupIds = array();
		$getProjectGroupMap = array();
		foreach ($getItemProjects as $itemProjectObj) {
			if(!in_array($itemProjectObj->groupid, $getProjectGroupIds)){
				array_push($getProjectGroupIds, $itemProjectObj->groupid);
				$getProjectGroupMap[$itemProjectObj->groupid][0] = $itemProjectObj->id;
			}else{
				array_push($getProjectGroupMap[$itemProjectObj->groupid], $itemProjectObj->id);
			}
		}

		// var_dump($getProjectGroupMap);
		// var_dump($getProjectGroupIds);

		$getProjectGroups = array();
		$groupObj = new Group();
		foreach ($getProjectGroupIds as $projectGroupId) {
			// var_dump($projectGroupId);
			$getProjectGroups[$projectGroupId] = $groupObj->selectObjectWithId($projectGroupId);
			// array_push($getProjectGroups, $groupObj->selectObjectWithId($projectGroupId));
		}

		
		// var_dump($getItemProjects);

		foreach ($getProjectGroups as $projectGroup) {
			$projectlist = array();
			$projectids = $getProjectGroupMap[$projectGroup['id']];
			foreach ($projectids as $projectid) {
				$projectObj = $project->selectObjectWithId($projectid);
				$itemIds = $getItemProjectsMap[$projectid];
				$itemlist = array();
				foreach ($itemIds as $itemId) {
					$itemlist[$itemId] = $itemobj->selectObjectWithId($itemId);
					//array_push($itemlist[$itemId],$itemobj->selectObjectWithId($itemId));
				}
				$projectObj->itemlist=$itemlist;
				// $projectObj->itemlist
				$projectlist[$projectid] = $projectObj;
			}
			// var_dump($projectlist);
			$getProjectGroups[$projectGroup['id']]['projectlist'] = $projectlist;
		}
		$getProjectGroups = std_class_object_to_array($getProjectGroups);
		// var_dump($getProjectGroups);
		echo json_encode($getProjectGroups);


		// for ($j=0; $j < sizeof($getProjectGroups); $j++) { 
		// 	$getProjectGroups[$j][0]['projectlist'] = $getItemProjects;
		// }

		// var_dump($getProjectGroups);
		// $userGroup = new Group_User();
		// $userGroup->userid = $param['userId'];
		// $groups = $userGroup->selectObjectWithUserId( $param['userId']);
		// // var_dump($groups);
		// $group_user=array();
		// for ($i=0; $i < sizeof($groups); $i++) { 
		// 	$group = std_class_object_to_array($groups[$i]);
		// 	array_push($group_user, $group);
		// }
		
		// var_dump($group_user);
	}
}

function std_class_object_to_array($stdclassobject)
{
    $_array = is_object($stdclassobject) ? get_object_vars($stdclassobject) : $stdclassobject;
    $array = array();
    foreach ($_array as $key => $value) {
        $value = (is_array($value) || is_object($value)) ? std_class_object_to_array($value) : $value;
        $array[$key] = $value;
    }

    return $array;
}


?>
