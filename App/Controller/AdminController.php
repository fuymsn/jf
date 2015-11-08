<?php

class AdminController extends BaseController
{

	function index()
	{
		require_once __CORE__."Model.php";
	
		$sql = new MySql();
	
		$result = $sql->select("id, type, category, iframesrc", "category")->query();
		
		include __APP__.'View/Admin/category.php';
	}
	
	function add()
	{
		require __CORE__."Model.php";
		
		$type = $_POST["type"];
		$category = $_POST["category"];
		$iframesrc = $_POST["iframesrc"];
		
		if (empty($category)) {
			exit("类别不能为空！");
		}
		
		if (empty($iframesrc)) {
			exit("iframe src不能为空");
		}
		
		$iframesrc = preg_replace("/((?<=from:\').*?(?=',mode))/", '______', $iframesrc);
		$iframesrc = preg_replace("/((?<=to:\').*?(?='\)))/", '______', $iframesrc);
		
		$sql = new MySql();
		
		$insertResult = $sql->insert("category", array("type"=>$type, "category"=>$category, "iframesrc"=>$iframesrc))->query();
		
		if (!$insertResult) {
			exit("添加失败");
		}else{
			header('Location: /admin?type='.$type);
			//$this->index();
			//$this->route(index);

		}
	}
	
	function delete()
	{
		require __CORE__."Model.php";
		
		$type = $_GET["type"];
		$cid = $_GET["cid"];
		$sql = new MySql();
		
		$deleteResult = $sql->delete("category")->where("id", $cid)->query();
		
		if(!$deleteResult){
			exit("删除失败");
		}else{
			header('Location: /admin?type='.$type);
		}
		
	}

}

?>