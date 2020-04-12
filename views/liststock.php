<hr>
<h2>Stock history (Last 50 movements)</h2>
<div >
    <section class="" style="max-height: 250px;overflow-y: auto;" >
    <table  border="1" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Observation</th>
                
            </tr>
        </thead>
        <tbody>
                <?php echo implode("",$product_stock_rows); ?>
        </tbody>
    </table>
    </section>
</div>