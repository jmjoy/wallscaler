<?php

/**
 * format print array (simple)
 * @param array $arr	the array which want to be print
 */
function p($arr) {
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

/**
 * Change the nostandard url to standard url
 * @param string $url	the nostandard url
 * @return mixed	string standard url or false
 */
function return_url($url) {
	
	if (stripos($url, 'http://') === 0) { // url start with http://

	} else if (strpos($url, '//') === 0) { // url start with //
		$url = 'http:' . $url;
	
	} else if (strpos($url, '/') === 0) { // url start with /
		$url = 'http:/' . $url;
	
	} else { // url start witch unknow
		$url = 'http://' . $url;
	}
	
	if (!filter_var($url, FILTER_VALIDATE_URL)) {
		return false;
	}
	return $url;
}
