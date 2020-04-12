<?php 
include "connection.php";
$function = filter_input(INPUT_GET,'f');
call_user_func($function);

function add_product(){
    $name = filter_input(INPUT_GET,'name');
    $presentation = filter_input(INPUT_GET,'presentation');
    $unit = filter_input(INPUT_GET,'unit');
    $category = filter_input(INPUT_GET,'category');
    global $connection;
    try {
       $query = "insert into product(name,presentation,unit,category) values('$name','$presentation','$unit','$category');";
        $r = mysqli_query($connection,$query);
        if($r)
            header('Location:index.php?msg=success');
        else
            var_dump($r,$query); 
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}

function update_product(){
    $product_id = filter_input(INPUT_GET,'product_id');
    $name = filter_input(INPUT_GET,'name');
    $presentation = filter_input(INPUT_GET,'presentation');
    $unit = filter_input(INPUT_GET,'unit');
    $category = filter_input(INPUT_GET,'category');
    global $connection;
    try {
       $query = "update product set ";
       $query .= "name = '$name',";
        $query .= "presentation = '$presentation',";
        $query .= "unit = '$unit',";
        $query .= "category = '$category' where id = $product_id";
        $r = mysqli_query($connection,$query);
        if($r)
            header('Location:index.php?msg=success');
        else
            var_dump($r,$query); 
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}
function delete_product(){
    $product_id = filter_input(INPUT_GET,'product_id');
    global $connection;
    try {
        $query = "delete from product where id = {$product_id}";
        $r = mysqli_query($connection,$query);
        $query2 = "delete from stock where product_id = {$product_id}";
        $r = mysqli_query($connection,$query);
        if($r)
            header('Location:index.php?msg=success');
        else
            var_dump($r,$query); 
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}

function update_stock(){
    $product_id = filter_input(INPUT_GET,'product_id');
    $amount = filter_input(INPUT_GET,'amount');
    $date = filter_input(INPUT_GET,'date')?"'".filter_input(INPUT_GET,'date')."'":'now()';
    $observation = filter_input(INPUT_GET,'observation');
    global $connection;
    try {
       $query = "insert into stock(product_id,amount,date,observation) values($product_id,'$amount',$date,'$observation');";
        $r = mysqli_query($connection,$query);
        if($r)
            header('Location:index.php?msg=success');
        else
            var_dump($r,$query); 
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
    
    
    

}
