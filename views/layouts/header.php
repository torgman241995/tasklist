<?php 
session_start();

if(!isset($_SESSION['role']) || empty($_SESSION['role']) || $_SESSION['role'] == NULL || $_SESSION['role'] == 0){
	$url = '/site/login';
	$message = 'Войти';
	$icon = 'bi bi-person';
}
else{
	$url = '/site/logout';
	$message = 'Выход';
	$icon = 'bi bi-box-arrow-right';
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TaskList</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../views/layouts/assets/img/favicon.png" rel="icon">
  <link href="../views/layouts/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../views/layouts/assets/css/custom_style.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../views/layouts/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../views/layouts/assets/css/style.css" rel="stylesheet">
</head>

<body class="toggle-sidebar">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/site/index" class="logo d-flex align-items-center">
        <img src="../views/layouts/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TaskList</span>
      </a>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">   
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?php echo $url; ?>">
            <span class="d-none d-md-block <?php echo $icon; ?> ps-2"> <?php echo $message; ?></span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
   <main id="main" class="main">