<?php

/**
 * 
 * @author jmjoy
 *
 */
class Curler {
	
	/**
	 * 
	 * @var unknown
	 */
	public $curl;
	
	/**
	 * 
	 * @param string $url
	 */
	public function __construct($url = null) {
		$this->curl = curl_init($url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
	}
	
	/**
	 * 
	 * @param string $handle
	 */
	public function exec($handle = true) {
		$res = curl_exec($this->curl);
		if ($handle) {
			$res = $this->_handleRes($res);
		}
		return $res;
	}
	
	/**
	 * 
	 */
	public function __destruct() {
		curl_close($this->curl);
	}
	
	/**
	 * 
	 * @param unknown $res
	 */
	private function _handleRes($res) {
		$pregs = array(
				'/src=(["\'])(.*?)\1/i',
				'/href=(["\'])(.*?)\1/i',
		);
		$replaces = array(
				'src=$1/?url=$2$1',
				'href=$1/?url=$2$1',
		);
		return preg_replace($pregs, $replaces, $res);
	}
}

function curler_preg_replace_handle($matches) {
	
}