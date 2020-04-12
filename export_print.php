<?php 
include 'connection.php';
include 'index_controller.php';
header('Content-Type: text/html; charset=utf-8');
include 'views/listproduct.php';
?>
<style>
    *{
        font-size: 10pt;
    }
</style>
<script>
    window.onload = function(){
        window.print();
    }
</script>
