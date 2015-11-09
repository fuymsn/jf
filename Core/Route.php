<?php

class Route{
	
	protected $route = [];
	
	//解析后的路由
	protected $routeParse = [];
	
	public function run($routeArr)
	{
		//获取path name
		$pathName = $this->getPathName();
		
		//判断访问页面是否存在
		$flag = false;
		foreach ($routeArr as $key => $value) {
			if($pathName == $key){
				$flag = true;
				$this->route = $value;
			}
		}
		
		header("Content-type: text/html; charset=utf-8");
		if(!$flag){
			exit("访问的页面不存在！");
		}
		
		//parse 解析路由
		$this->parse();
		
		//dispatcher 路由分发
		$this->dispatch();
	}
	
	public function parse()
	{
		$method = $this->getMethod();
		$controller = $this->getController();
		$action = $this->getAction();
		
		$this->routeParse = array(
			"url" => $this->getPathName(),
			"method" => $method,
			"controller" => $controller,
			"action" => $action
		);
	}
	
	//获取route的method
	public function getMethod()
	{
		$method = explode(":", $this->route["handle"])[0];
		return $method;
	}
	
	//获取route的controller
	public function getController()
	{
		$controller = explode("@", explode(":", $this->route["handle"])[1])[0];
		return $controller;
	}
	
	//获取类中的调用方法
	public function getAction()
	{
		$action = explode("@", $this->route["handle"])[1];
		return $action;
	}

	
	//获取path name
	public function getPathName()
	{
		$path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ""; //path
		return explode("?", $path)[0];
	}
	
	//分发器，调度器
	function dispatch()
	{
		//获取参数
		$controller = $this->routeParse["controller"];
		$action = $this->routeParse["action"];
		
		//实例化
		require __APP__.'Controller/'.$controller.'.php';
		$ins = new $controller;
		
		//var_dump($controller); die;
		$ins->$action();
	}
	
}

?>
