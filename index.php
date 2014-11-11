<?php

// import common function
require 'func/common.func.php';

// main : check the query string
if (!isset($_GET['url']) || trim($_GET['url']) == '') {
	require 'view/index.html';
	return;
}

$url = return_url(urldecode($_GET['url']));
if (!$url) {
	require 'view/index.html';
	return;
}

require 'class/Curler.class.php';
$curler = new Curler($url);
echo $curler->exec();
