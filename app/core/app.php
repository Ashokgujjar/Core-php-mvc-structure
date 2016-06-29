<?php

Class App
{
	protected $controller = 'home';
	
	protected $method = 'index';
	
	protected $params = array();
	
	public function __construct()
	{
		$url = $this->parseUrl();
		// Check requested controller exists or not
		if(file_exists(__DIR__.'/../controllers/'.$url[0].'.php'))
		{
			// override controller name by requested controller
			$this->controller = $url[0];
			unset($url[0]);
		}
		// include controller file
		require_once __DIR__.'/../controllers/'.$this->controller.'.php';
		// override controller object by actual controller
		$this->controller = new $this->controller;
		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : array();

		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	public function parseUrl()
	{
		if(isset($_GET['url']))
		{
			return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}