<?php

include "connection.php";
$function = filter_input(INPUT_GET, 'f');
call_user_func($function);

function add_product()
{
    $name = filter_input(INPUT_GET, 'name');
    $presentation = filter_input(INPUT_GET, 'presentation');
    $unit = filter_input(INPUT_GET, 'unit');
    $category = filter_input(INPUT_GET, 'category');
    global $connection;
    try {
        $query = "insert into product(name,presentation,unit,category) values('$name','$presentation','$unit','$category');";
        $r = mysqli_query($connection, $query);
        $product_id = mysqli_insert_id($connection);
        update_stock($product_id, filter_input(INPUT_GET, 'initial_stock'));
        // if($r)
        //     header('Location:index.php?msg=success');
        // else
        //     var_dump($r,$query);
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}

function update_product()
{
    $product_id = filter_input(INPUT_GET, 'product_id');
    $name = filter_input(INPUT_GET, 'name');
    $presentation = filter_input(INPUT_GET, 'presentation');
    $unit = filter_input(INPUT_GET, 'unit');
    $category = filter_input(INPUT_GET, 'category');
    global $connection;
    try {
        $query = "update product set ";
        $query .= "name = '$name',";
        $query .= "presentation = '$presentation',";
        $query .= "unit = '$unit',";
        $query .= "category = '$category' where id = $product_id";
        $r = mysqli_query($connection, $query);
        if ($r) {
            header('Location:index.php?msg=success');
        } else {
            var_dump($r, $query);
        }
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}

function update_product_batch()
{
    //dd($_GET);
    $new_stock = $_GET['new_stock'];
    $current_stock = $_GET['current_stock'];
    $date = filter_input(INPUT_GET, 'date') ? "'".filter_input(INPUT_GET, 'date')."'" : 'now()';
    $observation = filter_input(INPUT_GET, 'observation')??'Adjusment';
    $type = filter_input(INPUT_GET, 'type')??1;
    global $connection;
    $errors=[];
    $success =[];
    foreach ($current_stock as $product_id => $current_amount) {
        $new_amount = $new_stock[$product_id];
        $amount = (float)($new_amount - $current_amount);
        if ($amount != 0) {
            $query = "insert into stock(product_id,amount,date,observation) values($product_id,'$amount',$date,'$observation');";
            try {
                $r = mysqli_query($connection, $query);
                if (!$r) {
                    $errors[] = $product_id;
                } else {
                    $success[] =$product_id;
                }
            } catch (\Throwable $th) {
                $errors[] = $th;
            }
        } else {
        }
    }
    if (count($errors)>0) {
        var_dump($errors);
    } else {
        header('Location:index.php?msg=success&updated='.implode(',', $success));
    }
}

function delete_product()
{
    $product_id = filter_input(INPUT_GET, 'product_id');
    global $connection;
    try {
        $query = "delete from product where id = {$product_id}";
        $r = mysqli_query($connection, $query);
        $query2 = "delete from stock where product_id = {$product_id}";
        $r = mysqli_query($connection, $query2);
        if ($r) {
            header('Location:index.php?msg=success');
        } else {
            var_dump($r, $query);
        }
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}

function update_stock($product_id = null, $amount = 0, $date = 'now()', $observation = 'Initial stock')
{
    $product_id = $product_id??filter_input(INPUT_GET, 'product_id');
    $amount = filter_input(INPUT_GET, 'amount')??$amount;
    $date = filter_input(INPUT_GET, 'date') ? "'".filter_input(INPUT_GET, 'date')."'" : $date;
    $observation = filter_input(INPUT_GET, 'observation')??$observation;
    $type = filter_input(INPUT_GET, 'type')??1;

    $amount *= (int)$type;
    //dd($_GET,$amount);
    global $connection;
    try {
        $query = "insert into stock(product_id,amount,date,observation) values($product_id,'$amount',$date,'$observation');";
        $r = mysqli_query($connection, $query);
        if ($r) {
            header('Location:index.php?msg=success');
        } else {
            var_dump($r, $query);
        }
    } catch (\Throwable $th) {
        var_dump($th);
        //header('Location:index.php?msg=success');
    }
}
