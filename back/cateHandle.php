<?php

require("../model/sql.php");
session_start();

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

$insertResult = $sql->insert("category", array("category"=>$category, "iframesrc"=>$iframesrc))->query();

if (!$insertResult) {
	exit("添加失败");
}else{
	header("Location: /jf/back/category.php");
}

?>