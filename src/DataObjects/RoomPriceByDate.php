<?
namespace Slikeiv\Binovo\DataObjects;

use \DateTimeImmutable;


class RoomPriceByDate
{

  /**
   * @var DateTimeImmutable
   * Дата, на которую выставлена цена за номер.
   */
  private DateTimeImmutable $date;

  /**
   * @var float
   */
  private float $price;


  public function __construct(
      DateTimeImmutable $date,
      float $price
  ){
    $this->date = $date;
    $this->price = $price;
  }


  public function toArray(): array {
    return [
      $this->date->format('Y-m-d') => $this->price,
    ];
  }


  public function getDate(): DateTimeImmutable {
    return $this->date;
  }

  public function getPrice(): float {
    return $this->price;
  }

}
