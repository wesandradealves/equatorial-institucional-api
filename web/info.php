<?php


$variables = [
    'POSTGRES_HOST',
    'POSTGRES_DB',
    'POSTGRES_USER',
    'POSTGRES_PASSWORD',
    'POSTGRES_PORT',
    'PGADMIN_DEFAULT_EMAIL',
    'PGADMIN_DEFAULT_PASSWORD'
];

foreach ($variables as $var) {
    echo $var . ': ' . getenv($var) . PHP_EOL;
}
