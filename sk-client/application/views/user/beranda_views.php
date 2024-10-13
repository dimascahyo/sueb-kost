<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?= base_url("assets/style.css") ?>">
	<style>
		.container {
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.container h1.title_beranda {
			font-size: 8rem;
			background-color: #565656;
			color: transparent;
			text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.5);
			-webkit-background-clip: text;
			-moz-background-clip: text;
			background-clip: text;
		}
	</style>

</head>

<body>
	<?php $this->load->view('partials/navigation_bar_user'); ?>


	<div class="container">
		<h1 class="title_beranda">Sueb Kost</h1>
	</div>



</body>

</html>