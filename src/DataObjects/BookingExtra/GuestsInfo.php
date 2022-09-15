<?
namespace Slikeiv\Binovo\DataObjects\BookingExtra;


class GuestsInfo
{

  /**
   * @var string[]|null
   */
  private ?array $list;

  /**
   * @var integer|null
   */
  private ?int $number;

  /**
   * @var bool|null
   */
  private ?bool $isSmoking;

  /**
   *  @var string[]|null
   */
  private ?array $requests;


  public function __construct(
      ?array $list,
      ?int $number,
      ?bool $smoking,
      ?array $requests
  ){
    $this->list = $list;
    $this->number = $number;
    $this->smoking = $smoking;
    $this->requests = $requests;
  }


  public function toArray(): array {
    return [
      'List' => $this->list,
      'Number' => $this->number,
      'Smoking' => $this->smoking,
      'Requests' => $this->requests,
    ];
  }

  public function getList(): ?array {
    return $this->list;
  }

  public function getDeparture(): ?int {
    return $this->number;
  }

  public function isSmoking(): ?bool {
    return $this->smoking;
  }

  public function getRquests(): ?array {
    return $this->requests;
  }

}
