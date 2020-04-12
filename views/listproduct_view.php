<hr>
<h2>List products (stock availibility)</h2>
<div >
    <input id="table_filter" type="search" class="light-table-filter" data-table="order-table" placeholder="Filter">
    <section class="container" style="max-height: 250px;overflow-y: auto;">
    
    <table id="order_table" class="order-table table" border="1" >
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
                <?php echo implode("",$product_rows); ?>
        </tbody>
    </table>
    <form id="delete_product_form" action="controller.php" method="GET">
        <input type="hidden" name="f" value="delete_product" id="delete_controller">
        <input type="hidden" name="product_id" value="" id="product_delete_id" >
    </form>
    </section>
</div>