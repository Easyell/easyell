<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 文件上传相关的处理
 * 处理上传的文件，并返回有用的信息
 *  
 */
class Upload extends Model{
	/*
	 * 文件最大体积限制
	 * 文件类型限制
	 * 路径
	 * 临时文件名前缀
	 */
	private $maxSize = 0;
	private $allowedTypes = 0;
	private $upload_path = '';
	private $tmpPrefix = 'tmp_file';
	private $filesPath = 'public/files/file/';

	/*
	 * 上传的文件域的名
	 * 
	 */
	private $fieldName = 'field';
	private $filePathName = 'path';
	private $filenameName = 'fileName';
	private $overwriteName = 'isOverwrite';
	
	private $configPro = null;
	
	/*
	 * 临时文件
	 * 上传后文件名,不改变拓展名,
	 * 是否覆盖原文件，文件同名时
	 * 上传文件原名
	 * 文件类型
	 * 文件大小
	 */
	private $fileTmp = '';
	private $fileName = '';
	private $isOverwrite = FALSE;
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
			$this->overwriteName
		);
	}
	/*
	 * 文件上传设置初始化
	 * 
	 * 初始化相关参数
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
					
				}
			}
		}
		return array(
			'result' => $result,
			'data'   => $data
		);
	}
}
?>