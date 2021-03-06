<?php
class SqlOp extends Model{
	private $adress;
	private $port = ":3306";
	private $account;
	private $password;
	
	private $db;
	private $db_name = 'LightTracker';//'LightTracker';

	public $connect;
	public $result;
		
	function __construct() {
		$this->adress = "127.0.0.1".$this->port;
		$this->account = "root";
		$this->password = 123456;
		
		$this->connectTo();
	}
	public function setProperty($_ad,$_ac,$_ps,$_dbName){
		$this->adress = $_ad.$this->port;
		$this->account = $_ac;
		$this->password = $_ps;
		$this->db_name = $_dbName;
		return TRUE;
	}
	public function connectTo(){
		// if(phpversion()=='5.5'){
		// 	$this->connect = mysql_connect($this->adress,$this->account,$this->password);
		// 	mysql_set_charset('utf8',$this->connect);
		// 	if($this->connect){
		// 		$this->db = mysql_select_db($this->db_name);
		// 		if($this->db){
		// 			return TRUE;
		// 		}else{
		// 			return FALSE;
		// 		}
		// 	}else{
		// 		return FALSE;
		// 	}
		// }else{
			$this->connect = mysqli_connect($this->adress,$this->account,$this->password,$this->db_name);
			if($this->connect){
				return TRUE;
			}else{
				return FALSE;
			}
		// }
		
	}
	private function queryTo($_str){
		// $this->result = mysql_query($_str,$this->connect);
		$this->result = mysqli_query($this->connect,$_str);
		if($this->result!=FALSE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function close(){
		mysqli_close($this->connect);
		// mysql_close($this->connect);
	}
	public function reset(){
		$this->result = null;
	}
	public function insertTo($tableName,$values) {
		return $this->queryTo($this->getInsertSqlString($tableName,$values));
	}
	
	public function getInsertSqlString($tableName,$values) {
		$sqlStringPrefix = "insert into ".$tableName." values";
		$valueString = "";
		for ($i = 0; $i < count($values); $i++ ) {
			if($values[$i] == '') {
				$valueString = $valueString.'null'; 
			} else {
				$valueString = $valueString.("'".$values[$i]."'"); 
			}
			if ($i != count($values) - 1) {
				$valueString = $valueString.",";
			}
		}
		return $sqlStringPrefix."(".$valueString.")";
	}
	
	public function deleteItem($tableName,$key,$value) {
		return $this->queryTo($this->getDeleteSqlString($tableName,$key,$value));
	}

	public function getDeleteSqlString($tableName,$key,$value) {
		return "delete from ".$tableName." where ".$key."='".$value."'";
	}
	
	public function updateItem($tableName,$setKeys,$setValues,$searchKey,$searchValue) {
		return $this->queryTo($this->getUpdateSqlString($tableName,$setKeys,$setValues,$searchKey,$searchValue));
	}
	
	public function getUpdateSqlString($tableName,$setKeys,$setValues,$searchKey,$searchValue) {
		$sqlPrefix = "update ".$tableName." set ";
		$sqlBodyString = "";
		for ($i = 0; $i < count($setKeys);$i++) {
			$appendString = $setKeys[$i]."='".$setValues[$i]."'";
			$sqlBodyString = $sqlBodyString.$appendString;
			if($i != count($setKeys) - 1) {
				$sqlBodyString = $sqlBodyString.",";
			}
		}
		$sqlSuffix = " where ".$searchKey."='".$searchValue."'";
		return $sqlPrefix.$sqlBodyString.$sqlSuffix;
	}

	public function selectItem($tableName, $searchKey, $searchValue){
		$this->queryTo($this->getSelectSqlString($tableName, $searchKey, $searchValue));
		$array = array();
		while ($row = mysqli_fetch_array($this->result, MYSQL_ASSOC)) {
			array_push($array, $row);
		}
		return $array;
	}
	
	public function getSelectSqlString($tableName, $searchKey, $searchValue) {
		return "select * from ".$tableName." where ".$searchKey."='".$searchValue."'";
	}

	public function selectAll($tableName) {
		$this->queryTo("select * from ".$tableName);
		$array = array();
		while ($row = mysqli_fetch_array($this->result, MYSQL_ASSOC)) {
			array_push($array, $row);
		}
		return $array;
	
	}
}

?>
