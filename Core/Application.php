<?php

require __CORE__."Route.php";
require __CORE__."Controller.php";

class Application{
	
	/**
	 * 载入的路由数组
	 */
	protected $routes = [];
	
	/**
	 * 已经载入的配置
	 */
	protected $loadedConfigurations = [];
	
	//配置path
	protected $configPath = "../App/Config";
	
	//框架path
	protected $basePath = "./";
	
	//bind 注册树
	protected $bind = array();
	
	//bind 已经注册的对象
	protected $shared = array();
	
	//构造
	public function __construct()
	{
		$this->configure('route');
	}
	
	//run
	public function run()
	{
		//路由解析
		$this->make('route');
		$this->route->run($this->routes);
	}
	
	//获取配置路由
    protected function getConfigurationPath($name)
    {
        $appConfigPath = $this->configPath . '/' . $name . '.php';
        if (file_exists($appConfigPath)) {
            return $appConfigPath;
        }else{
			exit('file not exit');
		}
    }
	
	//配置
	public function configure($name){
		$this->loadedConfigurations[$name] = true;
		$path = $this->getConfigurationPath($name);
		if($path){
			$this->routes = require $this->configPath . '/' . $name . '.php';
		}
	}
	
	//实例化类，并放在注册树中
	protected function make($abstract)
	{	
		$this->bind[$abstract] = new $abstract();
		//如果实例化成功
		if(isset($this->bind[$abstract])){
			$this->shared[$abstract] = $this->bind[$abstract];
		}
	}
	
	//魔术方法，如果$this -> x中 x不存在，x会被当做key传入__get
	public function __get($key)
	{
		return $this->shared[$key];
	}
	
	public function __destruct()
	{
		
	}

}

?>
