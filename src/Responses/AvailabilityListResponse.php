<?
namespace Slikeiv\Binovo\Responses;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Slikeiv\Binovo\DataObjects\Availability;


class AvailabilityListResponse
{

  /**
   * @var Availability[]
   */
  private array $availability;


  public static function createFromArray(array $response): self
  {

      $object = new static();

      $object->availability = [];
      if(is_array($response['availability'])) {
        foreach ($response['availability'] as $key => $_availability) {
            $object->availability[] = Availability::create($key, $_availability);
        }
      }
      return $object;
  }

  public function toArray(): array {
      $arr = [];

      foreach ($this->availability as $key => $_availability) {
          $arr[] = $_availability->toArray();
      }
      return $arr;
  }


  public function getAvailability(): array {
    return $this->availability;
  }



}
