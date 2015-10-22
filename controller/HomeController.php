<?php

class HomeController{
	
	function __construct(){
		
	}

	function index()
	{
		require("./core/state.php");
    	require("./model/sql.php");
    	$sql = new MySql();
    	$categoryResult = $sql->select("id, category, iframesrc", "category")->query();
    	//isset 判断是否存在
    	$cid = !isset($_GET["cid"]) ? $categoryResult[0]['id'] : $_GET["cid"];
	
		include './view/home.php';
	}
	
}

?>