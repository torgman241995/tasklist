 <div class="pagetitle">
      <h1>Список задач</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Главная</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			<br>
             <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">Добавить задачу</button> 
              <div class="modal fade" id="addModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Добавление задачи</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="save" method="post">
						<div class="row mb-3">
						  <label for="inputText" class="col-sm-2 col-form-label">ФИО</label>
						  <div class="col-sm-10">
							<input type="number" name="csrf" class="form-control" value="<?php echo random_int(100, 999)?>" hidden required>
							<input type="text" name="name" class="form-control" min="3" max="250" required>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
						  <div class="col-sm-10">
							<input type="email" name="email" class="form-control" min="5" max="50" required>
						  </div>
						</div>
						
						<div class="row mb-3">
						  <label for="inputPassword" class="col-sm-2 col-form-label">Текст</label>
						  <div class="col-sm-10">
							<textarea class="form-control" name="text" min="5" max="250" required></textarea>
						  </div>
						</div>		
						<div class="row mb-3">
						  <div class="col-md-10">
							<button type="submit" class="btn btn-dark">Отправить</button>
						  </div>
						</div>

					  </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Пользователь</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Текст задачи</th>
                    <th scope="col">Статус задачи</th>
					<?php
						if($_SESSION['role'] == 2){
							?>
								<th scope="col">Управление</th>
							<?php
						}
					?>                    
                  </tr>
                </thead>
                <tbody>
				<?php			
					if($params){
						foreach($params as $el => $item){
							if($item['status'] == 0){
								$status = '<label class="badge bg-danger">New</label>';
							}
							if($item['status'] == 1){
								$status = '<label class="badge bg-success">Success</label>';
							}
							if($item['updated'] == 0){
								$update_status = NULL;
							}
							if($item['updated'] == 1){
								$update_status = '<label class="badge bg-success">Отредактировано администратором</label>';
							}
						?>
							<tr>
								<th scope="row"><?php echo $item['id']; ?></th>
								<td><?php echo $item['username']; ?></td>
								<td><?php echo $item['email']; ?></td>
								<td><?php echo $item['text']; ?></td>
								<td>
									<?php echo $status; 
										if($_SESSION['role'] == 2){
												echo $update_status;
										}
									?> 
								</td>
								<?php
									if($_SESSION['role'] == 2){
										?>
											<td>
												<a href="/site/update?id=<?php echo $item['id']; ?>" class="btn btn-dark">
													<i class="bi bi-gear"></i>
												</a>
											</td>
										<?php
									}
								?>								
							</tr>			
						<?php
						}
					}
				?>                  	  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>