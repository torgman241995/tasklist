<?php
	include('app/Core.php');
	$config = require('config/db.php');
	(new Core($config))->run();
?>
