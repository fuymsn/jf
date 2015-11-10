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
		
		$iframesrc = $this->parseIframeSrc($iframesrc);
		
		$sql = new MySql();
		
		$insertResult = $sql->insert("category", array("type"=>$type, "category"=>$category, "iframesrc"=>$iframesrc))->query();
		
		if (!$insertResult) {
			exit("添加失败");
		}else{
			header('Location: /admin?type='.$type);
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
	
	function update()
	{
		
		require __CORE__."Model.php";
		
		$category = $_GET['category'];
		$iframesrc = $_GET['iframesrc'];
		$id = $_GET['id'];
		
		if (empty($category)) {
			echo json_encode(array(
				"code" => 102,
				"msg" => "图表名称不能为空"
			));
			return;
		}
		
		if (empty($iframesrc)) {
			echo json_encode(array(
				"code" => 103,
				"msg" => "图表链接不能为空"
			));
			return;
		}
		
		$iframesrc = $this->parseIframeSrc($iframesrc);
		
		
		$sql = new MySql();
		
		$updateResult = $sql->update("category")
							->set(["category"=>$category, "iframesrc"=>$iframesrc])
							->where("id", $id)
							->query();
		
		if($updateResult){
			echo json_encode(array(
				"code" => 0,
				"msg" => "更新成功"
			));
		}else{
			echo json_encode(array(
				"code" => 101,
				"msg" => "更新失败"
			));
		}

	}
	
	function parseIframeSrc($src)
	{
		$src = preg_replace("/((?<=from:\').*?(?=',mode))/", '______', $src);
		$src = preg_replace("/((?<=to:\').*?(?='\)))/", '______', $src);
		return $src;
	}

}

?>