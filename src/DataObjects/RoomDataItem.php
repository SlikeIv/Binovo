<?
namespace Slikeiv\Binovo\DataObjects;


class RoomDataItem
{

  /**
   * @var integer
   */
  private int $room;


  /**
   * @var InfoByDataItem[]
   */
  private array $infoByDataItems;


  public static function create(int $roomId, array $roomData): self
  {
      $object = new static();
      $object->room =  $roomId;

      if(is_array($roomData)) {
        foreach ($roomData as $key => $_roomDate) {
            $object->infoByDataItems[] = InfoByDataItem::create($key, $_roomDate);
        }
      }
      return $object;
  }


  public function toArray(): array {
      $arr = ["room" => $this->room];

      foreach ($this->infoByDataItems as $key => $_infoByDataItem) {
          $arr["infoByDataItems"][] = $_infoByDataItem->toArray();
      }
      return $arr;
  }


  public function getInfoByDataItems(): array {
    return $this->infoByDataItems;
  }

  public function getRoom(): int {
    return $this->room;
  }



}
