<?php
class Tools extends Model {

	public function delete_slash($string) {
		$ste = "";
		for ($i = 0; $i < strlen($string); $i++) {
			if ($string[$i] = "\\") {

			} else {
				$str = $str . $string[$i];
			}
		}
		return $str;
	}

	/*
	 * 获取类名，即文件名
	 *
	 * $controller_len 完整的路径名的长度
	 *
	 * $extension_len '.php' 的拓展名长度为4
	 */
	public function get_php_filename($path) {
		$extension_len = 4;
		$path_len = strlen($path);

		$last_slash_pos = strrpos($path, '/');
		if($last_slash_pos === FALSE){
			$last_slash_pos = -1;
		}
		$name = substr($path, $last_slash_pos + 1, $path_len - $last_slash_pos - $extension_len - 1);

		return $name;
	}
}
?>
