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
		<pre style="color:<?php echo $db == 'inventario_cuarentena'?'red':'blue';?>">Usando DB <?php echo $db; ?></pre>
		<?php include 'views/addproduct_view.php';  ?>
		<?php include 'views/updatestock_view.php'; ?>
		<?php include 'views/listproduct_view.php'; ?>
	</body>
	<script src="assets/app.js"></script>
</html>