<?php 

return array(
	//page
	'/login'=>array('handle'=>'get:LoginController@index'),
	'/register'=>array('handle'=>'get:RegisterController@index'),
	'/home'=>array('handle'=>'get:HomeController@index'),
	'/'=>array('handle'=>'get:HomeController@index'),
	'/admin'=>array('handle'=>'get:AdminController@index'),
	
	//handle
	'/admin/add'=>array('handle'=>'post:AdminController@add'),
	'/admin/delete'=>array('handle'=>'get:AdminController@delete'),
	
	'/login/handle'=>array('handle'=>'post:LoginController@handle'),
	'/login/out'=>array('handle'=>'get:LoginController@out'),
	
	'/register/handle'=>array('handle'=>'post:RegisterController@handle'),
	
	//ajax request
	
	
	
);

// $route = array(
// 	'home/index'=>array('GET,POST','HomeController@index'),
// 	'home/login'=>'HomeController@login',
// 	'u/{id:\d}'=>'MemberController@index',
// 	'page[/{name:\w}]'=>'PageController@index',
// );

?>