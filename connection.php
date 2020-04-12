<?php 
if(file_exists('env.php')) {
    include 'env.php';
}

if(!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        return $value;
    }
}

function dd(...$args){
    // echo '<pre>';
    var_dump($args);    
    // echo '</pre>';
    if(true)die();
}

$connection = mysqli_connect(env('DB_HOST'),env('DB_USERNAME'),env('DB_PASSWORD'),env('DB_NAME'),env('DB_PORT'));
mysqli_set_charset($connection,'utf8mb4');