<?php 
//$db = filter_input(INPUT_GET,'debug')=='true'?'inventario_cuarentena_dev':'inventario_cuarentena';
$db = 'inventario_cuarentena';
$connection = mysqli_connect('localhost','root','',$db );
mysqli_set_charset($connection,'utf8mb4');