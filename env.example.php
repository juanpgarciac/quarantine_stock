
<?php
  $variables = [
      'DEBUG' => true,
      'DB_HOST' => 'localhost',
      'DB_USERNAME' => 'root',
      'DB_PASSWORD' => '',
      'DB_NAME' => 'inventario_cuarentena_dev',
      'DB_PORT' => '3306',
  ];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
