<?php
//可以是这种形式绑定
$fn_map = array(
	1001 => 'A.php',
	1002 => 'testUp.php'
);
/*--------------- 以上不需要new SqlOp --------------------*/
/*--------------- 以下上需要new SqlOp --------------------*/
//也可以这种形式绑定
$fn_map[2002]  = 'B.php';
$fn_map[3000] = 'LoginController.php';
$fn_map[3001] = 'ModifyProfileController.php';
$fn_map[3002] = 'UpdatePasswordController.php';
$fn_map[3003] = 'SignUpController.php';
$fn_map[3004] = 'CreateProjectController.php';

$fn_map[3005] = 'CreateItemController.php';

return $fn_map;
?>
