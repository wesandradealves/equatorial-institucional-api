<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * Provides a resource for handling CSV query parameters.
 *
 * @RestResource(
 *   id = "custom_rest_resource_csv",
 *   label = @Translation("CSV Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/csv"
 *   }
 * )
 */
class CsvResource extends ResourceBase {

  /**
   * The current request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $currentRequest;

  /**
   * Constructs a new CsvResource object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param array $serializer_formats
   *   The available serializer formats.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, array $serializer_formats, LoggerInterface $logger, Request $request) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->currentRequest = $request;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('sys_twig_extensions'),
      $container->get('request_stack')->getCurrentRequest()
    );
  }

  public function parseCsvToJson($url) {
    // Fetch the CSV content from the URL
    $csvContent = file_get_contents($url);

    if ($csvContent === false) {
        die('Error fetching CSV file.');
    }

    // Parse the CSV content
    $lines = explode("\n", $csvContent);
    $header = null;
    $data = [];

    foreach ($lines as $line) {
        // Skip empty lines
        if (trim($line) === '') {
            continue;
        }

        $row = str_getcsv($line);

        if (!$header) {
            // The first row is the header
            $header = $row;
        } else {
            // Combine header with row data to create associative array
            $data[] = array_combine($header, $row);
        }
    }

    // Convert parsed data to JSON
    $jsonData = json_encode($data);

    if ($jsonData === false) {
        die('Error encoding JSON: ' . json_last_error_msg());
    }

    // Output JSON data
    header('Content-Type: application/json');
    return $jsonData;
  }  


  /**
   * Responds to GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the query parameters.
   */
  public function get() {
    // Retrieve query parameters.
    $query_parameters = $this->currentRequest->query->all();
    $csv = $query_parameters['csv'];

    // Create the response.
    $response = new ResourceResponse($this->parseCsvToJson($csv));
    $response->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function permissions() {
    return [];
  }

}
