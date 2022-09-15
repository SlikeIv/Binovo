<?
namespace Slikeiv\Binovo\DataObjects;

use \DateTimeImmutable;


class AvailabilityItem
{

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $availabilityDate;


  /**
   * @var integer
   */
  private int $countRooms;


  public static function create(string $date, int $countRooms): self
  {

      $object = new static();
      $object->availabilityDate =  new \DateTimeImmutable($date);
      $object->countRooms = $countRooms;
      return $object;
  }



  public function toArray(): array {
      return [
        "availabilityDate" => $this->availabilityDate->format("Y-m-d H:i:s"),
        "countRooms" => $this->countRooms
      ];
  }


  public function getAvailabilityDate(): DateTimeImmutable {
    return $this->availabilityDate;
  }

  public function getCountRooms(): int {
    return $this->countRooms;
  }



}
