<?php

class HomeController{
	
	function __construct()
	{
		
	}

	function index()
	{
		session_start();
		
		if(!$_SESSION){
			header("Location: /login");
		}
		
    	require __CORE__."Model.php";
		
    	$sql = new MySql();
    	$categoryResult = $sql->select("id, type, category, iframesrc", "category")->query();
    	//isset 判断是否存在
    	$cid = !isset($_GET["cid"]) ? $categoryResult[0]['id'] : $_GET["cid"];
		
		include __APP__.'View/Front/home.php';
	}
	
}

?>
