<?php 
include "connection.php";
include "index_controller.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/HTML" />
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/app.css">
		<link rel="stylesheet" href="assets/select.min.css">
		<script src="assets/select.js"></script>
		<style>
			.select{
				max-width: 100% !important;
			}
		</style>
	</head>
	<body style="max-width: 800px;">
			
		<pre style="color:<?php echo !getenv('DEBUG')?'red':'blue';?>">You are in <?php echo getenv('DEBUG')?'testing':'production';?> environment</pre>
		<?php include 'views/addproduct.php';  ?>
		<?php include 'views/updatestock.php'; ?>
		<?php include 'views/listproduct.php'; ?>
	</body>
	<script src="assets/app.js"></script>
</html>