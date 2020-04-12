<?php 
include "connection.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="Text/HTML" />
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="assets/app.css">
		<link rel="stylesheet" href="assets/select.min.css">
		<script src="assets/select.min.js"></script>
	</head>
	<body>
		<pre style="color:<?php echo $db == 'inventario_cuarentena'?'red':'blue';?>">Usando DB <?php echo $db; ?></pre>
		<h2 id="product_h2">Add product</h2>
		<form action="controller.php"  method="GET">
			<input type="hidden" name="f" value="add_product" id="product_controller">
			<input type="hidden" name="product_id" value="update_product" id="product_id">
			<table>
				<tr><th>Name</th><th>Presentation</th><th>Unit</th></tr>
				<tr>
					<td><input type="text" name="name" placeholder="the product name" id="product_name"></td>
					<td><input type="number" name="presentation" value="1" id="product_presentation"></td>
					<td>
						<select name="unit" id="product_unit">
							<option value="und">und</option>
							<option value="gr">gr</option>					
							<option value="Kg">Kg</option>
							<option value="ml">ml</option>					
						</select>
					</td>
					<td>
						<select name="category" id="product_category">
							<option value="Bebidas">Bebidas</option>
							<option value="Carbohidratos">Carbohidratos</option>
							<option value="Condimentos">Condimentos</option>
							<option value="Frutos secos">Frutos secos</option>
							<option value="Galletas">Galletas</option>
							<option value="Granos/Cereales">Granos/Cereales</option>
							<option value="Grasas">Grasas</option>
							<option value="Otros">Otros</option>
							<option value="Proteinas">Proteinas</option>							
							<option value="Salsas">Salsas</option>
						</select>
					</td>	
				</tr>			
			</table>

			<button type="submit">Process</button>
			<button type="reset" onclick="reset_product()">Cancel</button>
			
		</form>
		<hr>
		<h2>List products (stock availibility)</h2>
		<div >
			<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
			<section class="container" style="max-height: 250px;overflow-y: auto;">
			
			<table class="order-table table" border="1" >
				<thead>
					<tr>
						<th>ID</th>
						<th>product</th>
						<th>presentation</th>
						<th>Unit</th>
						<th>Category</th>
						<th>Stock</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "select * from stock_availibility;";
						$result = mysqli_query($connection,$query);
						$product = [];
						$product_select = [];
						while($row = mysqli_fetch_assoc($result)){
							$product[] = $row;
							$product_select[] = "<option value=\"{$row['id']}\">{$row['name']} ({$row['presentation']} {$row['unit']})</option>";
							echo "<tr>";
							echo "<td>{$row['id']}</td>";
							echo "<td><a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">{$row['name']}</a></td>";
							echo "<td>{$row['presentation']}</td><td>{$row['unit']}</td><td>{$row['category']}</td><td>{$row['available']}</td>";
							echo "<td>";
							echo "<a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">Edit</a>&nbsp;|&nbsp;";
							echo "<a href=\"javascript:delete_product({$row['id']},'{$row['name']}');\">Delete</a>";
							echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<form id="delete_product_form" action="controller.php" method="GET">
				<input type="hidden" name="f" value="delete_product" id="delete_controller">
				<input type="hidden" name="product_id" value="" id="product_delete_id" >
			</form>
			</section>
		</div>
		<hr>
		<h2>Update stock</h2>
		<form action="controller.php" method="GET">
		<input type="hidden" name="f" value="update_stock">
			<table>
				<tr><th>Product</th><th>Ammount</th><th>Date</th><th>Observation</th></tr>
				<tr>
					<td>
						<select name="product_id" id="filter">
						<?php echo implode("",$product_select)?>
						</select>
					</td>
					<td><input type="number" name="amount" placeholder="amount" id="" step="0.1"></td>
					<td><input type="date" name="date" id="" value="<?php echo date('Y-m-d'); ?>"></td>
					<td><input type="text" name="observation" placeholder="observation" id="" value="Ajuste"></td>
				</tr>
			</table>
			<button type="submit">Process</button>
		</form>
		
	</body>
	<script src="assets/app.js"></script>
</html>