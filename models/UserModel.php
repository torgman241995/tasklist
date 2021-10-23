<?php		
	
	class UserModel
	{	    
		protected $table;
		protected $method;
		protected $params;
		
		//Обработчик
		public function run($table, $method, $params)
		{
			include ("config/db.php");
			if($params !== NULL){
				$data = $this->$method($table, $params);
			}
			else{
				$data = $this->$method($table);
			}
			
			return $data;
		}
		
		//Данные пользователя
		public function userData($table, $params)
		{
			include ("config/db.php");
			$login = $params['login'];
			$password = $params['password'];
			
			$query = $mysqli->query("SELECT * FROM $table WHERE login = '$login' AND password = '$password'");
			$line = mysqli_fetch_assoc($query);
			return $line;
		}
	}
	
?>
