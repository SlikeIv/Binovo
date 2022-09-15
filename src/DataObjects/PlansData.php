<?
namespace Slikeiv\Binovo\DataObjects;


class PlansData
{

  /**
   * @var integer
   */
  private int $plan;


  /**
   * @var RoomDataItem[]
   */
  private array $roomDataItems;


  public static function create(int $plan, array $roomsData ): self
  {

      $object = new static();
      $object->plan = $plan;
      $object->roomDataItems = [];

      if(is_array($roomsData)) {
        foreach ($roomsData as $key => $_roomsDate) {
            $object->roomDataItems[] = RoomDataItem::create($key, $_roomsDate);
        }
      }
      return $object;
  }

  public function toArray(): array {
      $arr = ["plan" => $this->plan];

      foreach ($this->roomDataItems as $key => $_roomDataItem) {
          $arr["roomDataItems"][] = $_roomDataItem->toArray();
      }
      return $arr;
  }



  public function getPlan(): int {
    return $this->plan;
  }

  public function getRoomDataItems(): array {
    return $this->roomDataItems;
  }


}
