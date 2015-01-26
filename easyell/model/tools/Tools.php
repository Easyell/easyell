<?php
echo "it words";
function delete_slash($string) {
	$ste = "";
	for ($i = 0; $i < strlen($string); $i++) {
		if ($string[$i] = "\\") {
			
		} else {
			$str = $str.$string[$i];
		}
	}
	return $str;
}
?>
