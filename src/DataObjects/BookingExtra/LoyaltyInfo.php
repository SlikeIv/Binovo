<?
namespace Slikeiv\Binovo\DataObjects\BookingExtra;


class LoyaltyInfo
{

  /**
   * @var string[]|null
   */
  private ?array $flags;

  /**
   * @var integer|null
   */
  private ?string $loyaltyId;


  public function __construct(
      ?array $flags,
      ?string $loyaltyId
  ){
    $this->flags = $flags;
    $this->loyaltyId = $loyaltyId;
  }


  public function toArray(): array {
    return [
      'flags' => $this->flags,
      'loyalty_id' => $this->loyaltyId,
    ];
  }

  public function getFlags(): ?array {
    return $this->flags;
  }

  public function getLoyaltyId(): ?string {
    return $this->loyaltyId;
  }


}
