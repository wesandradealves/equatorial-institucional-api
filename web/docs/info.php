<?php

print('database  ' . $_ENV['POSTGRES_DB'] . '<br><br>');
print('username  ' . $_ENV['POSTGRES_USER'] . '<br><br>');
print('password  ' . $_ENV['POSTGRES_PASSWORD'] . '<br><br>');

print('host  ' . $_ENV['POSTGRES_HOST'] . '<br><br>');
print('port  ' . $_ENV['POSTGRES_PORT'] . '<br><br>');


print('<br><br><br><br><br><br><br>');

phpinfo();
