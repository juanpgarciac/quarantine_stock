<hr>
<h2>Update stock</h2>
<form action="controller.php" method="GET">
<input type="hidden" name="f" value="update_stock">
    <table>
        <tr><th>Product</th><th>Ammount</th><th>Date</th><th>Observation</th></tr>
        <tr>
            <td style="width:40%;">
                <select name="product_id" id="filter" style="width:100%;">
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