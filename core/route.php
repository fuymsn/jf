<?php

require('./controller/BaseController.php');
//
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : ""; //path

//
$pathArr = explode("/", $path);
$pathArrLen = count($pathArr);

$route = array(
	'home/index'=>array('GET,POST','HomeController@index'),
	'home/login'=>'HomeController@login',
	'u/{id:\d}'=>'MemberController@index',
	'page[/{name:\w}]'=>'PageController@index',
);

$router = new Router($route);
$result = $router->pase($path);


$dispather = new Dispather();
$dispather->do($result);

//分发器，调度器
function dispather($handle, $pathArr)
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
	dispather("index", $pathArr);

//如果只有二级路由
}else if($pathArrLen == 3) {
	
	dispather($pathArr[2], $pathArr);

}

?>