<?php

class MySql{
	
	//链接状态
	private $_connection;
	//查询得到的sql，用于链式存储
	private $_sql;
	
	function __construct(){
		$this->connect();
	}
	
	//链接数据库
	function connect()
	{
		//1 首先链接数据
		$con = mysql_connect("127.0.0.1:3306", "root", "");
		
		//链接的时候用UTF8 字符集通信
		mysql_query("SET NAMES 'utf8'");

		if (!$con) {
			die("链接不成功");
		}
		
		// 2 选择要操作的数据
		mysql_select_db("younglogin", $con);
		
		$this->_connection = $con;
	}
	
	/**
	* 查询
	* $target 查询对象，用逗号符分割
	* $table 查询的表
	*/
	function select($target, $table)
	{
		$this->_sql = "select ". $target ." from ". $table;
		return $this;
	}

	/**
	* 查询
	* @param string $key 查询key
	* @param string $value 查询value
	* @param string $operator 操作符
	* @return object
	*/
	function where($key, $value, $operator="="){
		if(!strpos($this->_sql, "where")){
			$this->_sql = $this->_sql." where ".$key.$operator."'".$value."'";
		}else{
			$this->_sql = $this->_sql." and ".$key.$operator."'".$value."'";
		}

		return $this;
	}
	
	function limit($num){
		$this->_sql = $this->_sql." limit ".$num;
		
		return $this;
	}
	
	function query(){
		// 3 执行要做得sql 
		
		$exe = mysql_query($this->_sql);

		if (strpos($this->_sql, "select") === 0) {
			//如果是select

			//mysql_fetch_assoc 仅仅输出一条数据，所以需要循环出来
			// 4 获取返回的结果
			// 定义$result
			$result = array();
			
			while($data = mysql_fetch_assoc($exe))
			{
				$result[] = $data;
			}
			
			return $result;

		}else{

			//如果是其他
			return $exe;

		}
		

	}
	
	/*
	* 插入
	*/
	function insert($table, $arr)
	{	
		$strKeys = "";
		$strValues = "";
		
		foreach($arr as $key=>$value){
			$strKeys .= ",".$key;
			//addslashes 将单引号转义
			$strValues .= ","."'".addslashes($value)."'";
		}
		
		//过滤左边逗号
		$strKeys = ltrim($strKeys, ',');
		$strValues = ltrim($strValues, ',');
	
		$this->_sql = "insert into ".$table." (".$strKeys.") values(".$strValues.")";
		//$result = mysql_query($sql);
		
		return $this;
	}

	/**
	 * 删除
	 */
	function delete($table)
	{

	}
	
	function __destruct(){
		// 5 关闭数据库
		mysql_close($this->_connection);
	}
}


?>