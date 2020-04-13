<?php 
include "connection.php";
include "index_controller.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/HTML" />
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/app.css" />
		<style>
			header div{
				border: solid 1px <?php echo $debug_color?>;
			}
			header pre{
				color:<?php echo $debug_color?>
			}		
		</style>
	</head>
	<body style="max-width:80%;">
		<header >
			<div>
				<pre>You are in <?php echo env('DEBUG')?'testing':'production';?> environment.</pre>
				<pre>DB: <?php echo env('DB_NAME'); ?></pre>
			</div>		
		</header>		
		<?php include 'views/addproduct.php';  ?>
		<!-- <?php //include 'views/updatestock.php'; ?> -->
		<?php include 'views/listproduct.php'; ?>
		<?php if(!$print)include 'views/liststock.php'; ?>
		<!-- <script src="assets/select.js"></script> -->
		<script src="assets/app.js"></script>
	</body>
	
</html>