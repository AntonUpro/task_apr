<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'), 
    // 'dsn' => 'pgsql:host=localhost;dbname=task_apr',
    // 'port' => '5432',
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
