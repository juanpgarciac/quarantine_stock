<hr>
<h2>Update product stock <span id="product_name_span"></span></h2>
<form action="controller.php" method="GET">
<input type="hidden" name="f" value="update_stock">
    <table>
        <tr><th>Product</th><th>Ammount</th><th>Date</th><th>Observation</th></tr>
        <tr>
            <td style="width:40%;">
                <select name="product_id" id="filter" style="width:100%;" require>
                <?php echo implode("",$product_select)?>
                </select>
            </td>
            <td><input type="number" name="amount" placeholder="amount" id="" step="0.1" min="0" value="0.00" require></td>
            <td><input type="date" name="date" id="" value="<?php echo date('Y-m-d'); ?>" require></td>
            <td><input type="text" name="observation" placeholder="observation" id="" value="Ajuste" require></td>
        </tr>
        <tr><td colspan="4">
            <input type="radio" name="type" id="" checked value="1">&nbsp;In
            <input type="radio" name="type" id="" value="-1">&nbsp;Out
        </td></tr>
    </table>
    <button type="submit">Process</button>
</form>