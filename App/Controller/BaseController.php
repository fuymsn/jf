<?php 

class BaseController{

	function __construct()
	{
		
		session_start();
		
		$accessLimitPath = [
			"/admin",
			'/register',
		];
		
		$gid = $_SESSION ? $_SESSION["gid"] : [];
		
		//如果session 为空
		if(empty($gid)){
			exit("访问受限，请联系管理员");
		}
		
		$path = $_SERVER['REQUEST_URI'];
		
		foreach ($accessLimitPath as $value) {
			//如果进入的人为管理员
			if($value == $path && $gid == "0"){
				exit("访问受限，请联系管理员");
			}
		}
		
	}

}

?>