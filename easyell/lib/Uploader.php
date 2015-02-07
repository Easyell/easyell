<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 文件上传相关的处理
 * 处理上传的文件，并返回有用的信息
 *  
 */
class Upload{

	private $maxSize = 0;
	private $allowedTypes = 0;
	private $upload_path = '';
	private $tmpPrefix = 'tmp_file';

	private $fileTmp = '';
	private $fileName = '';
	private $fileOriginName = '';
	private $fileType = '';
	private $fileSize = 0;
	
	private $imageWidth = '';
	private $imageHeight = '';
	
	private $erorMsg = '';
}


?>