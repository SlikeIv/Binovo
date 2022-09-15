<?
namespace Slikeiv\Binovo\DataObjects\BookingExtra;


class ExtraFeesInfo
{

  /**
   * @var string[]|null
   */
  private ?array $excluded;

  /**
   * @var string|null
   */
  private ?array $included;


  public function __construct(
      ?array $excluded,
      ?array $included
  ){
    $this->excluded = $excluded;
    $this->included = $included;
  }


  public function toArray(): array {
    return [
      'excluded' => $this->excluded,
      'included' => $this->included,
    ];
  }


}
