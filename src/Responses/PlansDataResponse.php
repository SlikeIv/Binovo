<?
namespace Slikeiv\Binovo\Responses;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Slikeiv\Binovo\DataObjects\PlansData;


class PlansDataResponse
{

  /**
   * @var PlansData[]
   */
  private array $plansData;


  public static function createFromArray(array $response): self
  {

      $object = new static();

      $object->plansData = [];
      if(is_array($response['plans_data'])) {
        foreach ($response['plans_data'] as $key => $_plans_Data) {
            $object->plansData[] = PlansData::create($key, $_plans_Data);
        }
      }
      return $object;
  }

  public function toArray(): array {
    return [
      "plansData" => $object->plansData,
    ];
  }


  public function getPlansData(): array {
    return $this->plansData;
  }


}
