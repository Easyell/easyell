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
	private $allowedTypes = 0;
	private $upload_path = '';
	private $tmpPrefix = 'tmp_file';
	private $filesPath = 'public/files/file/';
	private $isOverwrite = FALSE;

	private $defaultConfig = null;
	
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
			$this->overwriteName
		);
		$this->defaultConfig = array(
			$this->fieldName => $this->field,
			$this->filePathName => $this->filesPath,
			$this->filenameName => null,
			$this->overwriteName => $this->isOverwrite
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

		if(!isset($_FILES[$config['field']])){
			return 'config hasnt field';
		}
	}
}
?>