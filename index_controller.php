<?php 

$query = "select * from stock_availibility;";
	$result = mysqli_query($connection,$query);
	$product = [];
	$product_select = [];
	while($row = mysqli_fetch_assoc($result)){
		$product[] = $row;
		$product_select[] = "<option value=\"{$row['id']}\">{$row['name']} ({$row['presentation']} {$row['unit']})</option>";
		$product_rows[] =
		"<tr>".
		"<td>{$row['id']}</td>".
		"<td><a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">{$row['name']}</a></td>".
		"<td>{$row['presentation']}</td><td>{$row['unit']}</td><td>{$row['category']}</td><td>{$row['available']}</td>".
		"<td>".
		"<a href=\"javascript:edit_product({$row['id']},'{$row['name']}','{$row['presentation']}','{$row['unit']}','{$row['category']}');\">Edit</a>&nbsp;|&nbsp;".
		"<a href=\"javascript:delete_product({$row['id']},'{$row['name']}');\">Delete</a>".
		"</td>".
		"</tr>";
	}