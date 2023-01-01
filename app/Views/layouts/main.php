<!DOCTYPE html>
<html lang="en">
<head> 
	<title>Ci 4 Basic Panel</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">

	<script src="<?= base_url('assets/js/app.js') ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<?php

		if ($_SESSION['role']==1) { 
		 echo $this->include('layouts/sidebar');
		}

		if ($_SESSION['role']==2) { 
		 echo $this->include('layouts/users-sidebar');
		}
		  ?>
		<div class="main">
			<!-- HEADER: MENU + HEROE SECTION -->
			<?= $this->include('layouts/header'); ?>
			<!-- CONTENT -->
			<main class="content">
				<div class="container-fluid p-0">
					<?= $this->include('common/alerts'); ?>
					<?= $this->renderSection('content'); ?>
				</div>
			</main>
			<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
			<?= $this->include('layouts/footer'); ?>
		</div>
	</div>
</body>

</html>