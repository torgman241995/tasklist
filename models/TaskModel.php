<?php		
	
	class TaskModel
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
		
		//Загрузить все записи
		public function loadAll($table)
		{
			$data = [];
			include ("config/db.php");
			$query = $mysqli->query("SELECT * FROM $table ORDER BY status ASC");
			while($arr = mysqli_fetch_assoc($query))
			{
				$data[] = $arr;
			}
			return $data;
		}
		
		//Загрузить конкретную запись
		public function loadOne($table, $id)
		{
			$data = [];
			include ("config/db.php");
			$query = $mysqli->query("SELECT * FROM $table WHERE id = '$id'");
			$data = mysqli_fetch_assoc($query);
			return $data;
		}
		
		//Работа с записью
		public function saveData($table, $params)
		{
			include ("config/db.php");
			$id = $params['id'];
			$name = $params['name'];
			$email = trim($params['email']);
			$text = trim($params['text']);
			$status = $params['status'];
			
			
			if(!empty($id) && $id !== NULL){
				//проверяем, не редактировался ли текст сообщения
				$query_check = $mysqli->query("SELECT * FROM $table WHERE id = '$id'");
				$check_result = mysqli_fetch_array($query_check);
				$old_text = $check_result['text'];
				
					$updated_status = $check_result['updated'];
				
					if($old_text == $text){
						$updated_status = $check_result['updated'];
					}
					else{
						$updated_status = 1;
					}
				
				$query = "UPDATE $table SET username = '$name', email = '$email', text = '$text', status = '$status', updated = $updated_status WHERE id = '$id'";
			}
			else{
				$query = "INSERT INTO $table (username, email, text, status) VALUES ('$name', '$email', '$text', '0')";
			}
			mysqli_query($mysqli, $query);
			return $query;
		}
	}
	
?>
