<?php

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

// Carregar o autoloader do Drupal
$autoloader = require_once 'autoload.php';

// Inicializar o ambiente do Drupal
$request = Request::createFromGlobals();
$kernel = DrupalKernel::createFromRequest($request, $autoloader, 'prod');
$kernel->boot();

try {
  // Verificar as variáveis de ambiente necessárias
  $required_env_vars = [
    'POSTGRES_HOST',
    'POSTGRES_DB',
    'POSTGRES_USER',
    'POSTGRES_PASSWORD',
    'POSTGRES_PORT',
    'DB_TYPE'
  ];
  foreach ($required_env_vars as $var) {
    if (empty(getenv($var))) {
      http_response_code(500);
      echo "Variável de ambiente $var não está definida.";
    }
  }

  // Verificar o acesso ao banco de dados
  $database = \Drupal::database();
  $query = $database->select('node', 'n')
    ->fields('n', ['nid'])
    ->range(0, 1);
  $result = $query->execute();

  if ($result->fetchField()) {
    // Se a consulta foi bem-sucedida, responder com HTTP 200
    http_response_code(200);
    echo 'Acesso ao banco de dados está funcionando corretamente.';
  } else {
    // Se a consulta não retornou resultados, responder com HTTP 500
    http_response_code(500);
    echo 'Erro: Não foi possível acessar o banco de dados.';
  }
} catch (Exception $e) {
  // Em caso de exceção, responder com HTTP 500
  http_response_code(500);
  echo 'Erro: ' . $e->getMessage();
}
