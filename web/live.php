<?php

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

// Carregar o autoloader do Drupal
$autoloader = require_once 'autoload.php';

// Inicializar o ambiente do Drupal
$request = Request::createFromGlobals();
$kernel = DrupalKernel::createFromRequest($request, $autoloader, 'prod');
$kernel->boot();

// Adicionar cabeçalhos CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

try {
  // Verificar o status do Drupal
  $entity_type_manager = \Drupal::entityTypeManager();
  $system_status = \Drupal::service('renderer');

  if ($entity_type_manager && $system_status) {
    // Se os serviços principais estão disponíveis, responder com HTTP 200
    http_response_code(200);
    echo 'Drupal está funcionando corretamente.';
  } else {
    // Se os serviços principais não estão disponíveis, responder com HTTP 500
    http_response_code(500);
    echo 'Erro: Serviços principais do Drupal não estão disponíveis.';
  }
} catch (Exception $e) {
  // Em caso de exceção, responder com HTTP 500
  http_response_code(500);
  echo 'Erro: ' . $e->getMessage();
}
