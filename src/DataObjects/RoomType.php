<?
namespace Slikeiv\Binovo\DataObjects;

use  \DateTimeImmutable;
use  \Slikeiv\Binovo\DataObjects\BookingExtra;


class RoomType
{

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $arrival;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $departure;

  /**
   * @var integer
   */
  private int $roomTypeId;

  /**
   * @var integer
   */
  private int $planId;

  /**
   * @var integer
   */
  private int $count;

  /**
   * @var integer
   */
  private int $adults;

  /**
   * @var integer
   */
  private int $children;


  /**
   * @var float
   */
  private float $amount;

  /**
   * @var RoomPriceByDate[]
   */
  private array $prices;

  /**
   * @var float
   */
  private float $penalty;

  /**
   * @var BookingExtra|null
   */
  private ?BookingExtra $extra;


  public function __construct(
      DateTimeImmutable $arrival,
      DateTimeImmutable $departure,
      int $roomTypeId,
      int $planId,
      int $count,
      int $adults,
      int $children,
      float $amount,
      array $prices,
      ?float $penalty,
      ?BookingExtra $extra
  ){
    $this->arrival = $arrival;
    $this->departure = $departure;
    $this->roomTypeId = $roomTypeId;
    $this->planId = $planId;
    $this->count = $count;
    $this->adults = $adults;
    $this->children = $children;
    $this->amount = $amount;
    $this->prices = $prices;
    $this->penalty = $penalty;
    $this->extra = $extra;

    //check arrival and  departure date
    if($this->arrival >= $this->departure) {
      throw new \InvalidArgumentException("arrival date greate than departure");
    }

    if(count($this->prices) == 0) {
      throw new \InvalidArgumentException("prices not be empty");
    }
  }


  public function toArray(): array {
    return [
      'arrival' => $this->arrival->format('Y-m-d H:i:s'),
      'departure' => $this->departure->format('Y-m-d H:i:s'),
      'room_type_id' => $this->roomTypeId,
      'plan_id' => $this->planId,
      'count' => $this->count,
      'adults' => $this->adults,
      'children' => $this->children,
      'amount' => $this->amount,
      'prices' => array_map(function($price) {
          return $price->toArray();
      }, $this->prices),
      'penalty' => $this->penalty,
      'extra' => $this->extra->toArray(),
    ];
  }

  public function getArrival(): DateTimeImmutable {
    return $this->arrival;
  }

  public function getDeparture(): DateTimeImmutable {
    return $this->departure;
  }

  public function geRoomTypeId(): int {
    return $this->roomTypeId;
  }

  public function getPlanId(): int {
    return $this->planId;
  }

  public function getCount(): int {
    return $this->count;
  }

  public function getAdults(): int {
    return $this->adults;
  }

  public function getChildren(): int {
    return $this->children;
  }

  public function getPrices(): array {
    return $this->prices;
  }

  public function getPenalty(): ?float {
    return $this->comment;
  }

  public function getExtra(): ?BookingExtra  {
    return $this->extra;
  }


}
