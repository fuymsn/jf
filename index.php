<?php

function e($a){
	echo '<pre>';
	var_dump($a);
	echo '</pre>';
}
$c =  $_GET['c']; //controller name  
$a =  $_GET['a']; //action name
 $controller = $c . 'Controller';
 
 
 include('./controller/'.$controller.'.php');
 $index = new $controller;
 $index->$a();
 
 
?>