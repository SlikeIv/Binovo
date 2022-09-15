<?
namespace Slikeiv\Binovo\DataObjects;

use Slikeiv\Binovo\DataObjects\BookingExtra\GuestsInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\LoyaltyInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\OtaInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ServicesInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ExtraFeesInfo;



class BookingExtra
{

  /**
   * @var string|null
   */
  private ?string $board;

  /**
   * @var string[]|null
   */
  private ?array $rates;

  /**
   * @var GuestsInfo|null
   */
  private ?GuestsInfo $guests;

  /**
   * @var Loyalty|null
   */
  private ?LoyaltyInfo $loyalty;

  /**
   * @var OtaInfo|null
   */
  private ?OtaInfo $otaInfo;

  /**
   * @var ServicesInfo|null
   */
  private ?ServicesInfo $services;

  /**
   * @var ExtraFeesInfo|null
   */
  private ?ExtraFeesInfo $extraFees;

  /**
   * @var float|null
   */
  private ?float $otaCommission;


  public function __construct(
      ?string $board,
      ?array $rates,
      ?GuestsInfo $guests,
      ?LoyaltyInfo $loyalty,
      ?OtaInfo $otaInfo,
      ?ServicesInfo $services,
      ?ExtraFeesInfo $extraFees,
      ?float $otaCommission
  ){
    $this->board = $board;
    $this->rates = $rates;
    $this->guests = $guests;
    $this->loyalty = $loyalty;
    $this->otaInfo = $otaInfo;
    $this->services = $services;
    $this->extraFees = $extraFees;
    $this->otaCommission = $otaCommission;
  }

  public function toArray(): array {
    return [
      'Board' => $this->board,
      'Rates' => $this->rates,
      'Guests' => $this->guests ? $this->guests->toArray() : null,
      'Loyalty' => $this->loyalty ? $this->loyalty->toArray() : null,
      'Ota info' => $this->otaInfo ? $this->otaInfo->toArray() : null,
      'Services' => $this->services ? $this->services->toArray() : null,
      'Extra fees' => $this->extraFees ? $this->extraFees->toArray() : null,
      'Ota commission' => $this->otaCommission,
    ];
  }

  public function getBoard(): ?string {
    return $this->board;
  }

  public function getRates(): ?string {
    return $this->rates;
  }

  public function getGuests(): ?GuestsInfo {
    return $this->guests;
  }

  public function getLoyalty(): ?LoyaltyInfo {
    return $this->loyalty;
  }

  public function getOtaInfo(): ?OtaInfo {
    return $this->otaInfo;
  }

  public function getServices(): ?ServicesInfo {
    return $this->services;
  }

  public function getExtraFees(): ?ExtraFeesInfo {
    return $this->extraFees;
  }

  public function getOtaCommission(): ?float {
    return $this->otaCommission;
  }

}
