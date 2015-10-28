<?php

class Application{

	function __construct()
	{
		
	}
	
	function run(){
		//echo "hi"; die;
		require __CORE__."Route.php";
		require __CORE__."Controller.php";
		
	}
	
	function __destruct()
	{
		
	}

}

?>
