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