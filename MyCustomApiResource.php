namespace Drupal\my_api\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a REST API resource.
 *
 * @RestResource(
 *   id = "my_custom_api_resource",
 *   label = @Translation("My Custom API Resource"),
 *   uri_paths = {
 *     "canonical" = "/api/v1/custom-endpoint",
 *     "create" = "/api/v1/custom-endpoint"
 *   }
 * )
 */
class MyCustomApiResource extends ResourceBase {

  /**
   * Responds to POST requests.
   *
   * @param Request $request
   *   The request object.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response object.
   */
  public function post(Request $request) {
    // Decode the JSON request body.
    $data = json_decode($request->getContent(), TRUE);
    if (json_last_error() !== JSON_ERROR_NONE) {
      return new ResourceResponse(['error' => 'Invalid JSON'], 400);
    }

    // Process the data (custom logic here).
    $processed_data = $this->processData($data);

    return new ResourceResponse(['data' => $processed_data], 200);
  }

  /**
   * Process the incoming data.
   */
  private function processData(array $data) {
    // Example: Return the received data.
    return $data;
  }
}
