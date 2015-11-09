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
		$con = new mysqli("127.0.0.1:3366", "root", "", "jf");
		
		//链接的时候用UTF8 字符集通信
		$con->query("SET NAMES 'utf8'");

		if (!$con) {
			exit("链接不成功");
		}
		
		// 2 选择要操作的数据
		$con->select_db("jf");
		
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
		// for 循环断线重连
		
		//var_dump($this->_sql); exit;
		
		for($i= 0 ; $i < 2 ; $i ++ ){
			$exe = $this->_connection->query($this->_sql);
			
			//var_dump($exe); exit();
			if($exe === false){
				if(mysql_errno() == '2006'){
					//ping 轻量
					mysql_ping(); 
					continue;
				}
				return $exe;
			}
			
			if (strpos($this->_sql, "select") === 0) {
				//如果是select
	
				//mysql_fetch_assoc 仅仅输出一条数据，所以需要循环出来
				// 4 获取返回的结果
				// 定义$result
				$result = array();
				
				while($data = mysqli_fetch_assoc($exe))
				{
					$result[] = $data;
				}
				
				return $result;
	
			}else{
				//如果是其他
				return $exe;
	
			}
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
		
		//var_dump($this->_sql); exit;
		return $this;
	}

	/**
	 * 删除
	 */
	function delete($table)
	{
		$this->_sql = "delete from ".$table;
		
		return $this;
	}
	
	function __destruct(){
		// 5 关闭数据库
		mysqli_close($this->_connection);
	}
}


?>
