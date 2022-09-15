<?
namespace Slikeiv\Binovo\DataObjects\BookingExtra;


class ServicesInfo
{

  /**
   * @var string[]|null
   */
  private ?array $free;

  /**
   * @var string|null
   */
  private ?array $additional;


  public function __construct(
      ?array $free,
      ?array $additional
  ){
    $this->free = $free;
    $this->additional = $additional;
  }


  public function toArray(): array {
    return [
      'free' => $this->free,
      'additional' => $this->additional,
    ];
  }


}
