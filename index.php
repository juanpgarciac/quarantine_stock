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
			header{
				position: fixed;
				top: 0;				
				width: 100%;
				/* height: 70px; */				
			}
			header div{
				padding: 0 20px;
				float:right;
				background: #fff;
				border: solid 1px <?php echo $debug_color?>;
			}
			header pre{
				font-size: small;
				font-weight:bold;
				color:<?php echo $debug_color?>
			}
			table td.in{
				background: #bbffb3;
			}
			table td.out{
				background: #fcd9e0;
			}
		</style>
	</head>
	<body style="max-width: 800px;">
		<header >
			<div>
				<pre>You are in <?php echo env('DEBUG')?'testing':'production';?> environment.</pre>
				<pre>DB: <?php echo env('DB_NAME'); ?></pre>
			</div>		
		</header>		
		<?php include 'views/addproduct.php';  ?>
		<?php include 'views/updatestock.php'; ?>
		<?php include 'views/listproduct.php'; ?>
		<?php if(!$print)include 'views/liststock.php'; ?>
		<script src="assets/app.js"></script>
	</body>
	
</html>