<hr>
<h2>Products list (stock availibility)</h2>
<div >
    <?php if(!$print){ ?>
    <input id="table_filter" type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
    <?php }?>
    <section class="container" <?php echo !$print?'style="max-height: 250px;overflow-y: auto;"':''; ?> >
    
    <table id="order_table" class="order-table table" border="1" >
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
    <?php if(!$print){ ?>
    <br>
    <button onclick="window.location.href = 'export_print.php?print'" >Print list</button>
    <button onclick="window.location.href = 'export_csv.php'" >Export to CSV</button>
    <?php }?>
    <form id="delete_product_form" action="controller.php" method="GET">
        <input type="hidden" name="f" value="delete_product" id="delete_controller">
        <input type="hidden" name="product_id" value="" id="product_delete_id" >
    </form>
    </section>
</div>