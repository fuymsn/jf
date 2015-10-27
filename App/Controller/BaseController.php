<?php 

class BaseController{

	function __construct()
	{
		
		session_start();
		
		$accessLimitPath = [
			"/admin",
			'/register',
		];
		
		$gid = $_SESSION["gid"];
		$path = $_SERVER['PATH_INFO'];
		
		foreach ($accessLimitPath as $value) {
			if($value == $path && $gid == "0"){
				exit("访问受限，请联系管理员");
			}
		}
		
	}

}

?>