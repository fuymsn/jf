<?php

class Application{
	
	protected $routes = [];
	/**
	 * 已经载入的配置
	 */
	protected $loadedConfigurations = [];
	
	public function __construct()
	{
		$this->configure('route');
	}
	
	public function run(){
		//echo "hi"; die;
		require __CORE__."Route.php";
		require __CORE__."Controller.php";
		
	}
	
	public function get($url, $action){
		$this->addRoute('GET', $url, $action);
	}
	
	public function post($url, $action){
		$this->addRoute('POST', $url, $action);
	}
	
	//添加路由到路由配置数组
	public function addRoute($method, $url, $action){
		$this->routes[$method . $url] = ['method' => $method, 'url' => $url, 'action' => $action];
	}
	
	//配置
	public function configure($name){
		$this->loadedConfigurations[$name] = true;
		$path = $this->getConfigurationPath($name);
		if($path){
			
		}
	}
	
    /**
     * 根据给出的 配置选项的值获取对应的加载文件的路径
     *
     * @param  string $name
     * @return string
     */
    protected function getConfigurationPath($name)
    {
        $appConfigPath = ($this->configPath ?: $this->basePath('config')) . '/' . $name . '.php';
        if (file_exists($appConfigPath)) {
            return $appConfigPath;
        } elseif (file_exists($path = __DIR__ . '/../App/Config/' . $name . '.php')) {
            return $path;
        }
    }
	
	//分发
	function dispatcher()
	{
		
	}
	
	public function __destruct()
	{
		
	}

}

?>
