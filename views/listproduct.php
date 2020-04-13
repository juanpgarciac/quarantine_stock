<hr>
<h2>Products list (stock availibility)</h2>
<div >
<form action="controller.php">
    <input type="hidden" name="f" value="update_product_batch" >
    <?php if(!$print){ ?>
        <input type="date" name="date"  value="<?php echo date('Y-m-d'); ?>" required>
        <input type="text" name="observation" placeholder="observation" value="Ajuste" required>
        <button type="submit">Update stock</button>
        <button type="reset">Cancel</button>
        <br>
        <input id="table_filter" type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
    <?php }?>
    <section class="container" <?php echo !$print?'style="max-height: 250px;overflow-y: auto;"':''; ?> >
        <table id="order_table" class="order-table table" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>product</th>
                    <th>presentation</th>
                    <th>Unit</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <?php if(!$print){ ?>
                    <th>Action</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                    <?php echo implode("",$product_rows); ?>
            </tbody>
        </table>

    </section>
    </form>
    <?php if(!$print){ ?>
        <h4>All DB product list:</h4>
        <button onclick="window.location.href = 'export_print.php?print'" >Print</button>
        <button onclick="window.location.href = 'export_csv.php'" >Export to CSV</button>

    <?php }?>
</div>
<form id="delete_product_form" action="controller.php" method="GET">
        <input type="hidden" name="f" value="delete_product" id="delete_controller">
        <input type="hidden" name="product_id" value="" id="product_delete_id" >
    </form>