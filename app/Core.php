<?php		

	class Core
	{
		protected $config = [];

		public function __construct($config)
		{
			$this->config = $config;
		}

		public function run()
		{
			 $this->route();
		}
		
		    
		public function route()
		{
			$request = $_SERVER["REQUEST_URI"];
			if($request == '/'){
				$controller = 'SiteController';
				$action = 'actionIndex';
			}
			else{
				$request_data = explode("/", $request);
			
				$controller_name = $request_data[1];
				$action_name = $request_data[2];			
				
				if(isset($controller_name) && !empty($controller_name) && $controller_name !== NULL){
					$controller = ucfirst($controller_name."Controller");
				}	
				else{
					$controller = "ErrorController.php";
				}
				
				if(isset($action_name) && !empty($action_name) && $action_name !== NULL){
					$action = "action".ucfirst($action_name);
				}	
				else{
					$action = "actionIndex";
				}
			}
			
			$this->load($controller, $action);
		}
		
		
		public function load($controller, $action)
		{
			$controller_url = "controllers/".$controller.".php";				
				if (file_exists($controller_url)) {					
					include($controller_url);
				} else {
					$controller = 'SiteController';
					include('controllers/SiteController.php');
				}
				
				(new $controller())->$action();
		}
	}
?>