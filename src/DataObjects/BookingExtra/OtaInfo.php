<?
namespace Slikeiv\Binovo\DataObjects\BookingExtra;


class OtaInfo
{

  /**
   * @var string|null
   */
  private ?string $info;

  /**
   * @var string|null
   */
  private ?string $hotelId;

  /**
   * @var string|null
   */
  private ?string $rateName;

  /**
   * @var string|null
   */
  private ?string $hotelName;

  /**
   * @var string|null
   */
  private ?string $extraInfo;

  /**
   * @var string|null
   */
  private ?string $facilities;

  /**
   * @var string|null
   */
  private ?string $currencyCode;

  /**
   * @var string|null
   */
  private ?string $payType;

  /**
   * @var float|null
   */
  private ?float $paidSum;

  /**
   * @var integer|null
   */
  private ?int $prepay;

  /**
   * @var string|null
   */
  private ?string $paymentMethodComment;


  public function __construct(
      ?string $info,
      ?string $hotelId,
      ?string $rateName,
      ?string $hotelName,
      ?string $extraInfo,
      ?string $facilities,
      ?string $currencyCode,
      ?string $payType,
      ?float $paidSum,
      ?int $prepay,
      ?string $paymentMethodComment
  ){
    $this->info = $info;
    $this->hotelId = $hotelId;
    $this->rateName = $rateName;
    $this->hotelName = $hotelName;
    $this->extraInfo = $extraInfo;
    $this->facilities = $facilities;
    $this->currencyCode = $currencyCode;
    $this->payType = $payType;
    $this->paidSum = $paidSum;
    $this->prepay = $prepay;
    $this->paymentMethodComment = $paymentMethodComment;
  }


  public function toArray(): array {
    return [
      'info' => $this->info,
      'Hotel id' => $this->hotelId,
      'Rate name' => $this->rateName,
      'Hotel name' => $this->hotelName,
      'extra_info' => $this->extraInfo,
      'facilities' => $this->facilities,
      'Currency code' => $this->currencyCode,
      'Pay type' => $this->payType,
      'Paid sum' => $this->paidSum,
      'prepay' => $this->prepay,
      'PaymentMethodComment' => $this->paymentMethodComment,
    ];
  }


}
