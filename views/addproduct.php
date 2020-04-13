<h2 id="product_h2">Add product</h2>
		<form action="controller.php"  method="GET">
			<input type="hidden" name="f" value="add_product" id="product_controller">
			<input type="hidden" name="product_id" value="" id="product_id">
			<table>
				<tr><th>Name</th><th>Presentation</th><th>Unit</th><th>Category</th><th>Initial stock</th></tr>
				<tr>
					<td><input type="text" name="name" placeholder="the product name" id="product_name" required></td>
					<td><input type="number" name="presentation" value="1" id="product_presentation" required></td>
					<td>
						<select name="unit" id="product_unit" required>
							<?php echo implode("",$units_options); ?>
						</select>
					</td>
					<td>
						<!-- This is the harcoded categories select, you can improve it with a table or something else -->
						<select name="category" id="product_category" required>
							<?php echo implode("",$categories_options); ?>
						</select>
					</td>
					<td><input type="number" name="initial_stock" id="initial_stock" step="0.1" value="0.00" min="0"></td>	
				</tr>			
			</table>

			<button type="submit">Process</button>
			<button type="reset" onclick="reset_product()">Cancel</button>
			
		</form>