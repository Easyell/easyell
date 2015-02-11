<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 文件上传相关的处理
 * 处理上传的文件，并返回有用的信息
 *  
 */
class Uploader extends Model{
	/*
	 * 文件上传域
	 * 文件最大体积限制
	 * 文件类型限制
	 * 路径
	 * 临时文件名前缀
	 * 是否覆盖原文件，文件同名时
	 * 
	 */
	private $field = 'file';
	private $maxSize = 0;
	private $allowedTypes = '*';
	private $upload_path = '';
	private $tmpPrefix = 'tmp_file';
	private $filesPath = 'public/files/file/';
	private $isOverwrite = FALSE;

	private $defaultConfig = null;
	
	/*
	 * 
	 */
	private $originNameName = 'fileOriginName';
	private $fileTypeName = 'fileType';
	 
	private $fieldName = 'field';
	private $filePathName = 'path';
	private $filenameName = 'fileName';
	private $overwriteName = 'isOverwrite';
	private $allowedTypesName = 'allowedTypes';
	
	private $configPro = null;
	
	/*
	 * 临时文件
	 * 上传后文件名,不改变拓展名,
	 * 上传文件原名
	 * 文件类型
	 * 文件大小
	 */
	private $fileTmp = '';
	private $fileName = '';
	private $fileOriginName = '';
	private $fileType = '';
	private $fileSize = 0;
	/*
	 * 如果文件是图片，宽
	 * 如果文件是图片，高
	 */
	private $imageWidth = '';
	private $imageHeight = '';
	/*
	 * 错误信息
	 */
	private $erorMsg = '';
	
	public function __construct(){
		$this->configPro = array(
			$this->fieldName,
			$this->filePathName,
			$this->filenameName,
			$this->overwriteName,
			$this->allowedTypesName
		);
		$this->defaultConfig = array(
			$this->fieldName => $this->field,
			$this->filePathName => $this->filesPath,
			$this->filenameName => null,
			$this->overwriteName => $this->isOverwrite,
			$this->allowedTypesName => $this->allowedTypes
		);
	}
	/*
	 * 文件上传设置初始化
	 * 初始化相关参数
	 * 
	 * $config=array(
	 *   field
	 *   filePath
	 *   filename
	 *   isOverwrite
	 * )
	 *  
	 */
	public function upload($config){
		$result = TRUE;
		$data = null;

		if(!is_array($config)){

			$result = FALSE;
			$data = 'config param isnt array';
		}else{
			if(!isset($config[$this->fieldName])){

				$result = FALSE;
				$data = 'config param hasnt field name';
			}else{

				foreach ($this->configPro as $i => $name) {
					if(!isset($config[$name])){
						$config[$name] = $this->defaultConfig[$name];
					}
				}
				$data = $this->do_upload($config);
			}
		}
		return array(
			'result' => $result,
			'data'   => $data
		);
	}
	/*
	 * 上传动作
	 * 
	 * 根据config动作	
	 */
	public function do_upload($config){
		$result = TRUE;
		$data = null;		

		if(!isset($_FILES[$config['field']])){
			$result = FALSE;
			$data = 'config hasnt field';
		}
		$this->file = $_FILES[$config['field']];
		var_dump($this->file);
		var_dump($config);

		if(!$this->validate_upload_path($config)){
			$result = FALSE;
			$data = 'config has invalidate path';
		}
		if(! is_uploaded_file($this->file['tmp_name'])){
			$result = FALSE;
			$data = 'file isnt uploaded file';
		}
		if(! $this->validate_file_type($config)){
			$result = FALSE;
			$data = 'invalidate file type or allowedTypes isnt a array';
		}
		if(! $this->set_filename($config)){
			$result = FALSE;
			$data = 'set filename fail';
		}
		if(! $this->move_file($config)){
			$result = FALSE;
			$data = 'move upload file fail';
		}
		
		return array(
			'result' => $result,
			'data'   => $data
		);
	}
	/*----------------------一系列验证函数---------------------------*/
	
	/*
	 * 验证路径，是否是已经存在文件夹
	 * 
	 */
	public function validate_upload_path($config){
		
		$path = $config[$this->filePathName];

		$isExists = file_exists($path);
		if($isExists){
			return is_dir($path);
		}else{
			return FALSE;
		}
	}
	/*
	 * 验证文件类型
	 * 根据config，如果无，则根据默认设置
	 */
	public function validate_file_type(&$config){
		
		$lastDot = strrpos($config[$this->filenameName], '.');
		
		$fileType = substr($config[$this->filenameName], $lastDot+1);		
		
		$config[$this->fileTypeName] = $fileType;
		
		$allowedTypeArr = $config[$this->allowedTypesName];
		if($allowedTypeArr == '*'){	
			return TRUE;
		}else{
			if(!is_array($allowedTypeArr)){
				return FALSE;
			}
			for($i=0,$len=count($allowedTypeArr);$i<$len;$i++){
				if($allowedTypeArr[$i] == $fileType){
					return TRUE;
				}
			}
			return FALSE;
		}
	}
	/*
	 * 设置文件名
	 * 根据原名和config的指定，并保留原名
	 */
	public function set_filename(&$config){
		if(isset($config[$this->filenameName])){
			$config[$this->originNameName] = $this->file['name'];
		}else{
			$config[$this->originNameName] = $config[$this->filenameName] = $this->file['name'];
		}
		return TRUE;
	}
	/*
	 * 移动file至目标地
	 */
	public function move_file($config){
		$r = move_uploaded_file($this->file['tmp_name'], $config[$this->filePathName].$config[$this->filenameName]);
		return $r;
	}
}
?>