<?php		
	
	class View
	{	    
		protected $controller;
		protected $name;
		protected $params;
		
		//Обработчик
		public function render($params)
		{
			$request = $_SERVER["REQUEST_URI"];
			if($request == '/'){
				$controller = 'site';
				$action = 'index';
			}
			else{
				$request_data = explode("/", $request);
			
				$controller_name = $request_data[1];
				$action_name = $request_data[2];			
				
				if(isset($controller_name) && !empty($controller_name) && $controller_name !== NULL){
					$controller = $controller_name;
				}	
				else{
					$controller = "error";
				}
				
				if(isset($action_name) && !empty($action_name) && $action_name !== NULL){
					if(stristr($action_name, '?') !== FALSE) {
						$action_name = stristr($action_name, '?', true);
					}
					$action = $action_name.".php";
				}	
				else{
					$action = "index.php";
				}
			}
			
			$this->load($controller, $action, $params);
		}
		
		public function load($controller, $action, $params)
		{
			include('layouts/header.php');
			$view_url = "views/".$controller."/".$action;				
				if (file_exists($view_url)) {					
					include($view_url);
				} else {
					include('site/index.php');
				}
			include('layouts/footer.php');
		}	
	}
	
?>
