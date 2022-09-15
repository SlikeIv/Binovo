<?
namespace Slikeiv\Binovo\DataObjects;



class Availability
{

  /**
   * @var integer
   */
  private int $roomtype;


  /**
   * @var AvailabilityItem[]
   */
  private array $availabilityItems;


  public static function create(int $roomtype, array $roomsByDates ): self
  {

      $object = new static();
      $object->roomtype = $roomtype;
      $object->availabilityItems = [];

      if(is_array($roomsByDates)) {
        foreach ($roomsByDates as $key => $_roomsByDate) {
            $object->availabilityItems[] = AvailabilityItem::create($key, $_roomsByDate);
        }
      }
      return $object;
  }

  public function toArray(): array {
      $arr = ["roomtype" => $this->roomtype];

      foreach ($this->availabilityItems as $key => $_availabilityItem) {
          $arr["availabilityItems"][] = $_availabilityItem->toArray();
      }
      return $arr;
  }



  public function getRoomType(): int {
    return $this->roomtype;
  }

  public function getAvailabilityItems(): array {
    return $this->availabilityItems;
  }


}
