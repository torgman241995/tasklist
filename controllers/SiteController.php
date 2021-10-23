<?php		
session_start();
include('models/TaskModel.php');
include('models/UserModel.php');
include('views/View.php');

	class SiteController
	{	
		    
		public function actionIndex()
		{
			$model = new TaskModel();
			$view = new View();
			$result = $model->loadAll('tasks', NULL);
			$view->render($result);
		}
		
		public function actionUpdate()
		{
			$model = new TaskModel();
			$view = new View();
			$id = $_GET['id'];
			$result = $model->loadOne('tasks', $id);
			$view->render($result);
		}
		
		public function actionSave()
		{
			$model = new TaskModel();
			$view = new View();
			
			if($_SESSION['role'] == 2){
				if($_POST){
					//Обрабатываем поля и пишем в базу, если токен в рамках указанного диапазона
					if($_POST['csrf'] && $_POST['csrf'] >= 100 && $_POST['csrf'] <= 999){
						//базовая проверка ФИО и почты
						$lenght_name = strlen($_POST['name']);
						$lenght_email = strlen($_POST['email']);
						
						if($lenght_name < 1 || $lenght_email < 5)
						{
							$result = 0;
						}	
						else{
							//проверка email
							if(stristr($_POST['email'], '@') !== FALSE) {
								//базовая обработка полей
								if($_POST['id']){
									$id = $_POST['id'];
								}
								else{
									$id = NULL;
								}
								
								if($_POST['status']){
									$status = $_POST['status'];
								}
								else{
									$status = 0;
								}
								
								$name = $this->cleaner($_POST['name']);
								$email = $this->cleaner($_POST['email']);
								$text = $this->cleaner($_POST['text']);
								
								$data['id'] = $id;
								$data['name'] = $name;
								$data['email'] = $email;
								$data['text'] = $text;
								$data['text'] = $text;
								$data['status'] = $status;
								
								//Передаем данные в модель
								$model->saveData('tasks', $data);
								$result = 1;	
							}	 
							else{
								$result = 0;
							}
						}									
					}
					else{
						$result = 0;
					}
				}			
			}
			else{
				$result = 0;
			}			
			
			$view->render($result);
		}
		
		public function actionLogin()
		{
			$model = new UserModel();
			$view = new View();
			
			if($_POST){
				//Обрабатываем поля и пишем в базу, если токен в рамках указанного диапазона
				if($_POST['csrf'] && $_POST['csrf'] >= 100 && $_POST['csrf'] <= 999){
					//базовая проверка ФИО и почты
					$login = trim($_POST['login']);
					$login = $this->cleaner($login);
					$password = trim($_POST['password']);
					$password = $this->cleaner($password);
					
					$data['login'] = $login;
					$data['password'] = $password;
					$user = $model->userData('users', $data);
					if(isset($user) && !empty($user) && $user !== NULL){
						if($user['role'] == 1){
							$result = 2; 
						}
						if($user['role'] == 0){
							$result = 3; 
						}
					}
					else{
						$result = 1; 
					}
				}
			}
			$_SESSION['role'] = $result;
			$view->render($result);
		}
		
		public function cleaner($string)
		{
			$start = array("<?", "?>", "<", ">", "/script", "script", "select", "delete", "$(", "alert", "::", "??", "$");
			$replace   = array(" ");

			$clear_string = str_replace($start, $replace, $string);
			return $clear_string;
		}
		
		public function actionLogout()
		{
			$view = new View();
			unset($_SESSION['role']);
			session_destroy();
			$view->render(NULL);
		}
		
		public function actionError()
		{
			$model = new TaskModel();
			$view = new View();
			$result = $model->loadAll('tasks', NULL);
			$view->render($result);
		}
	}
?>
