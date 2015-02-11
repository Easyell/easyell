<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 在 core/route.php 中
 * 
 * 控制器
 * 
 * @author jyouger
 * 
 */
class Controller extends C{
	
	private $dbOpPath  = 'db/SqlOp.php';
	private $dbObjName = 'SqlOp';
	
	public function __construct($isSql = FALSE){
		if($isSql){
			if(!isset($GLOBALS['SqlOp'])){
				global $SqlOp;
				$this->load($this->dbOpPath);
				$SqlOp = $this->SqlOp;
			}
		}
	}
	/*
	 * 全局的SqlOp连接 
	 * 
	 */
	public function close(){
		if(property_exists($this,$this->dbObjName)){
			$propName = $this->dbObjName;
			$this->$propName->close();
		}else if (property_exists($this,strtolower($this->dbObjName))){
			$propName = strtolower($this->dbObjName);
			$this->$propName->close();
		}else{
			return NULL;
		}
		return TRUE;
	}
}

?>
