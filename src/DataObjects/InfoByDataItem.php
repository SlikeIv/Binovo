<?
namespace Slikeiv\Binovo\DataObjects;

use \DateTimeImmutable;


class InfoByDataItem
{


  /**
   * @var DateTimeImmutable
   * Дата, на которую выставлены соответствующие значения.
   */
  private DateTimeImmutable $date;


  /**
   * @var float
   */
  private ?float $price;


  /**
   * @var integer
   */
  private ?int $minStay;


  /**
   * @var integer
   */
  private ?int $maxStay;


  /**
   * @var integer
   */
  private ?int $minStayArrival;


  /**
   * @var integer
   */
  private ?int $closed;

  /**
   * @var integer
   */
  private ?int $closedArrival;

  /**
   * @var integer
   */
  private ?int $closedDeparture;



  public static function create(string $date, array $infoData): self
  {

      $object = new static();
      $object->date =  new \DateTimeImmutable($date);
      $object->price = $infoData['price'] ?? null;
      $object->minStay = $infoData['min_stay']  ?? null;
      $object->minStayArrival = $infoData['min_stay_arrival']  ?? null;
      $object->maxStay = $infoData['max_stay']  ?? null;
      $object->closed = $infoData['closed']  ?? null;
      $object->closedArrival = $infoData['closed_arrival']  ?? null;
      $object->closedDeparture = $infoData['closed_departure']  ?? null;
      return $object;
  }


  public function toArray(): array {
      return [
        "date" =>  $this->date->format("Y-m-d"),
        "price" =>  $this->price,
        "minStay" =>  $this->minStay,
        "minStayArrival" =>  $this->minStayArrival,
        "maxStay" =>  $this->maxStay,
        "closed" =>  $this->closed,
        "closedArrival" =>  $this->closedArrival,
        "closedDeparture" =>  $this->closedDeparture,
      ];
  }

  public function getDate(): DateTimeImmutable {
    return $this->date;
  }

  public function getPrice(): ?float {
    return $this->price;
  }

  public function getMinStay(): ?int {
    return $this->minStay;
  }

  public function getMaxStay(): ?int {
    return $this->maxStay;
  }

  public function getMinStayArrival(): ?int {
    return $this->minStayArrival;
  }

  public function getClosed(): ?int {
    return $this->closed;
  }

  public function getClosedArrival(): ?int {
    return $this->closedArrival;
  }

  public function getClosedDeparture(): ?int {
    return $this->closedDeparture;
  }



}
