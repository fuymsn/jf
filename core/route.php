<?php

require('./controller/BaseController.php');

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : ""; //path

$pathArr = explode("/", $path);
$pathArrLen = count($pathArr);

function router($handle, $pathArr)
{
	$controller = ucfirst($pathArr[1] . 'Controller'); //controller name
	require('./controller/'.$controller.'.php');
	//echo './controller/'.$controller.'.php';
	$ins = new $controller;

	$ins->$handle();
}

//如果没有输入路由
if ($pathArrLen == 1) {

	header('Location: /home');

//如果只有一级路由
}else if($pathArrLen == 2){
	router("index", $pathArr);

//如果只有二级路由
}else if($pathArrLen == 3) {
	
	router($pathArr[2], $pathArr);

}

?>