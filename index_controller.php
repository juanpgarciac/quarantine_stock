<?php 
	$print = isset($_GET['print']);
	$query = "select * from stock_availibility;";
	$result = mysqli_query($connection,$query);
	$products = [];
	$product_select = [];
	$product_rows = [];
	$fields = ['id','name','presentation','unit','stock','category'];
	while($row = mysqli_fetch_assoc($result)){
		$products[] = $row;
		$product_select[] = "<option value=\"{$row['id']}\">{$row['name']} ({$row['presentation']} {$row['unit']})</option>";
		$product_rows[] =
		"<tr>".
		"<td>{$row['id']}</td>".
		"<td><a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">{$row['name']}</a></td>".
		"<td>{$row['presentation']}</td><td>{$row['unit']}</td><td>{$row['category']}</td><td>{$row['available']}</td>".
		(!$print?"<td>". 
		"<a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">Edit</a>&nbsp;|&nbsp;".
		"<a href=\"javascript:delete_product({$row['id']},'{$row['name']}');\">Delete</a>".
		"</td>":"").
		"</tr>";
	}
	$product_stock_rows = [];
	$query = "select product.name,product.presentation,product.unit,stock.product_id,stock.amount,date(stock.date) as date,stock.observation from product inner join stock on product.id = stock.product_id  order by stock.date desc,stock.id desc limit 50; ";
	$result = mysqli_query($connection,$query);
	// <tr><th>Product ID</th><th>Product</th><th>Adjustment</th><th>Date</th><th>Observation</th></tr>
	while($row = mysqli_fetch_assoc($result)){
		$product_stock[] = $row;
		$product_stock_rows[] = "<tr><td>{$row['product_id']}</td>".
		"<td>{$row['name']} ({$row['presentation']} {$row['unit']})</td>".
		"<td>{$row['amount']} </td>".
		"<td>{$row['date']} </td>".
		"<td>{$row['observation']} </td>".
		"</tr>";
	}