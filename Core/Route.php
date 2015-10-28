<?php

$path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ""; //path

//
$pathArr = explode("/", $path);

//var_dump($pathArr); exit();
$pathArrLen = count($pathArr);

// $route = array(
// 	'home/index'=>array('GET,POST','HomeController@index'),
// 	'home/login'=>'HomeController@login',
// 	'u/{id:\d}'=>'MemberController@index',
// 	'page[/{name:\w}]'=>'PageController@index',
// );

// $router = new Router($route);
// $result = $router->pase($path);


// $dispather = new Dispather();
// $dispather->do($result);

//分发器，调度器
// function dispatcher($handle, $pathArr)
// {
// 	$controller = ucfirst($pathArr[1] . 'Controller'); //controller name
// 	require('./controller/'.$controller.'.php');
// 	//echo './controller/'.$controller.'.php';
// 	$ins = new $controller;

// 	$ins->$handle();
// }

function router($handle, $pathArr){
	$controller = ucfirst($pathArr[1].'Controller'); //controller name
	require __APP__.'Controller/'.$controller.'.php';
	//echo './controller/'.$controller.'.php';
	$ins = new $controller;
	
	//before
	// handel request like get / post
	// *
	//var_dump($controller); die;
	
	$ins->$handle();
	
	//after
	
	//*
	
}
//var_dump($pathArr);
//如果没有输入路由
if ($pathArrLen == 1) {
	//header('Location: /');
	router("index", ['', 'home']);
	
//如果只有一级路由
}else if($pathArrLen == 2){
	//dispatcher("index", $pathArr);
	//var_dump($pathArr); exit;
        if($pathArr[1] == ""){
		router("index", ['', 'home']);
        }else{
		router("index", $pathArr); 

        }
	//var_dump($pathArr); die;
//如果只有二级路由
}else if($pathArrLen == 3) {
	//dispatcher($pathArr[2], $pathArr);
	router($pathArr[2], $pathArr);
}

?>
