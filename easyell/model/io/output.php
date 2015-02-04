<?php
/*
 * 输出类，
 * 
 * json：Fn，以json格式返回
 * 
 * jsonp：Fn，以jsonp格式返回
 * 
 */
class Output extends Model{
	
	private $callbackName = 'callback';
	
	/*
	 * $paramArr,接收数组格式的参数
	 * $isFilter,是否过滤第一个参数中的空数据, 默认不
	 * 
	 * $result,返回结果，如果失败，则带有失败原因
	 */
	public function json($paramArr,$isFilter = FALSE){
		$result = TRUE;
		$data = null;
		
		$callback = null;
		$returnJson = null;
		
		if(is_array($paramArr) || is_object($paramArr)){
			if($isFilter){
				$tmp = array();
				foreach ($paramArr as $key => $value) {
					if($value){
						$tmp[$key] = $value;
					}
				}
				$paramArr = $tmp;
			}
			
			$returnJson = json_encode($paramArr);
			
			$callback = isset($_GET[$this->callbackName])?$_GET[$this->callbackName]:null;
			if(!$callback){
				$callback = isset($_POST[$this->callbackName])?$_POST[$this->callbackName]:null;
			}
			
		}else if(isset($paramArr)){
				
			$callback = isset($_GET[$this->callbackName])?$_GET[$this->callbackName]:null;
			if(!$callback){
				$callback = isset($_POST[$this->callbackName])?$_POST[$this->callbackName]:null;
			}
			
			$paramArr = array($paramArr);
			$returnJson = json_encode($paramArr);
			
		}else{
			$result = FALSE;
			$data = 'first param isnt number';
		}

		//jsonp
		if($callback){
			header("Content-type: text/html");
			echo $callback.'('.$returnJson.');';
		//json
		}else{
			header("Content-type: application/json");
			echo $returnJson;			
		}
		
		return array(
			'result' => $result,
			'data'   => $data
		);
	}
}
?>