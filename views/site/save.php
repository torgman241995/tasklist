	<?php
		if($params == 1)
		{
			$message = 'Задача успешно добавлена!';
			$url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Check_green_icon.svg/2048px-Check_green_icon.svg.png';
		}
		else{
			$message = 'Ошибка добавления задачи!';
			$url = 'https://cdn0.iconfinder.com/data/icons/shift-free/32/Error-512.png';
		}
	?>
    <div class="pagetitle">
      <h1>Список задач</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/site/index">Главная</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Создать</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6 offset-3">
          <div class="card success_box">
            <div class="card-body text-center">			
				<img class="success" src="<?php echo $url; ?>" alt="<?php echo $message; ?>">
				<h3 class="success_title"><?php echo $message; ?></h3>				
				<a href="/site/index" class="btn btn-dark">Перейти на главную</a>
            </div>
          </div>
        </div>
      </div>
    </section>