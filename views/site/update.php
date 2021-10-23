<?php
	
	if($params['status'] == 0){
		$status = 'New';
	}
	if($params['status'] == 1){
		$status = 'Success';
	}
?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Редактирование задачи</h5>
                  </div>
					<?php if($_SESSION['role'] == 2){?>
					  <form id="form" class="row g-3 needs-validation" method="post" action="save">
						<div class="col-12">
						  <label for="yourUsername" class="form-label">ФИО</label>
						  <div class="input-group has-validation">
							<input type="number" name="csrf" class="form-control" value="<?php echo random_int(100, 999)?>" hidden required>
							<input type="number" name="id" class="form-control" value="<?php echo $params['id'];?>" hidden required>
							<input type="text" name="name" class="form-control" id="yourUsername" value="<?php echo $params['username'];?>" required>
							<div class="invalid-feedback">Введите ФИО</div>
						  </div>
						</div>
						<div class="col-12">
						  <label for="yourEmail" class="form-label">E-mail</label>
						  <div class="input-group has-validation">
							<input type="email" name="email" class="form-control" id="yourEmail" value="<?php echo $params['email'];?>" required>
							<div class="invalid-feedback">Введите E-mail</div>
						  </div>
						</div>
						<div class="col-12">
						  <label for="yourText" class="form-label">Текст задачи</label>
						  <div class="input-group has-validation">
							<textarea type="text" name="text" class="form-control" id="yourText" required><?php echo $params['text'];?></textarea>
							<div class="invalid-feedback">Введите Текст задачи</div>
						  </div>
						</div>
						<div class="col-12">
						  <label for="yourStatus" class="form-label">Статус</label>
						  <div class="input-group has-validation">
							<select name="status" class="form-select" aria-label="Статус" required>
							  <option value="<?php echo $params['status'];?>"><?php echo $status;?></option>
							  <option value="0">New</option>
							  <option value="1">Success</option>
							</select>
							<div class="invalid-feedback">Выберите статус</div>
						  </div>
						</div>
					   
						<div class="col-12">
						  <button class="btn btn-primary w-100" type="submit">Сохранить</button>
						</div>
					  </form>
				  <?php }
				  else{?>
					<div class="col-12 text-center">
						<h5>У Вас нету доступа для редактирования записей</h5>
					</div>
				  <?php }?>
                </div>
              </div>

            </div>
          </div>
        </div>
