<?php 
	$debug_color = !env('DEBUG')?'red':'blue';
	$print = isset($_GET['print']);
	$query = "select * from stock_availibility;";
	$result = mysqli_query($connection,$query);
	$products = [];
	$product_select = [];
	$product_rows = [];
	$fields = ['id','name','presentation','unit','stock','category'];
	while($row = mysqli_fetch_assoc($result)){
		$class= '';
		if(!$print){
			$class= ($row['available']>1)?'in':'out';
		}
		$left = '';
		if($row['available']>0){
			$left = $row['available'].' left';
		}else{
			$left = 'out';
		}
		
		$products[] = $row;
		$product_select[] = "<option value=\"{$row['id']}\">{$row['name']} ({$row['presentation']} {$row['unit']}) < {$left} </option>";
		$product_rows[] =
		"<tr>".
		"<td>{$row['id']}</td>".
		"<td><a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">{$row['name']}</a></td>".
		"<td>{$row['presentation']}</td>".
		"<td>{$row['unit']}</td>".
		"<td>{$row['category']}</td>".
		"<td class=\"$class\">
		<input  type=\"hidden\" value=\"{$row['available']}\" name=\"current_stock[{$row['id']}]\" />
		<input  type=\"number\" min=\"0\" step=\"0.1\" value=\"{$row['available']}\" name=\"new_stock[{$row['id']}]\"/></td>".
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
		if($row['amount']==0){
			$sign = '';
			$class = '';
		}else{
			$class= ($row['amount']>0)?'in2':'out2';
			$sign = ($row['amount']>0)?'+':'';
		}
		$product_stock[] = $row;
		$product_stock_rows[] = "<tr><td>{$row['product_id']}</td>".
		"<td>{$row['name']} ({$row['presentation']} {$row['unit']})</td>".
		"<td class=\"$class\">{$sign}{$row['amount']} </td>".
		"<td>{$row['date']} </td>".
		"<td>{$row['observation']} </td>".
		"</tr>";
	}