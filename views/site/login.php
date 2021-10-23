<?php
	$message = 'Для авторизации - введите логин и пароль';
	$class = 'text_black';
	if($params == 1)
	{
		$message = 'Пользователь с такими данными не найден!';
		$class = 'text_red';
	}
	if($params == 2 || $params == 3)
	{
		$message = 'Подождите. Сейчас Вы будете перенаправлены на страницу с данными';
		$class = 'text_green';
	}
?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/site/index" class="logo d-flex align-items-center w-auto">
                  <img src="/views/layouts/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">TaskList</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Вход в профиль</h5>
                    <p class="text-center small <?php echo $class; ?>" id="params" data-attribute="<?php echo $params; ?>"><?php echo $message;?></p>
                  </div>

                  <form id="form" class="row g-3 needs-validation" method="post">
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Логин</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
						<input type="number" name="csrf" class="form-control" value="<?php echo random_int(100, 999)?>" hidden required>
                        <input type="text" name="login" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Введите логин</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Пароль</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Введите пароль!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Войти</button>
                    </div>
                  </form>
                    <div class="row" id="preloader">
					    <div class="col-12 text-center">
						    <div class="row ">
							    <div class="col-lg-4 offset-2">
								    <img class="login_preloader" src="https://upload.wikimedia.org/wikipedia/commons/5/54/Ajux_loader.gif" alt="loading">
							    </div>
						    </div>
					    </div>
				    </div>
                </div>
              </div>

            </div>
          </div>
        </div>
