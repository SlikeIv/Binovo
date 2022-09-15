<?
namespace Slikeiv\Binovo\DataObjects;

use \DateTimeImmutable;

class CreateBookingResult
{

  /**
   * @var integer
   */
  private int $accountId;

  /**
   * @var string
   */
  private string $otaId;

  /**
   * @var string
   */
  private string $otaBookingId;

  /**
   * @var string
   */
  private string $linkId;

  /**
   * @var integer
   */
  private int $statusId;

  /**
   * @var integer
   */
  private int $roomtypeId;

  /**
   * @var integer
   */
  private int $planId;

  /**
   * @var integer
   */
  private int $parentRoomTypeId;

  /**
   * @var string
   */
  private string $number;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $arrival;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $departure;

  /**
   * @var string|null
   */
  private ?string $name;

  /**
   * @var string|null
   */
  private ?string $surname;

  /**
   * @var string|null
   */
  private ?string $email;

  /**
   * @var string|null
   */
  private ?string $phone;

  /**
   * @var float
   */
  private float $amount;

  /**
   * @var string
   */
  private ?string $promoCode;

  /**
   * @var bool
   */
  private bool $isFetched;

  /**
   * @var int|null
   */
  private ?int $paid;

  /**
   * @var string|null
   */
  private ?string $paymentKey;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $createDate;

  /**
   * @var DateTimeImmutable
   */
  private DateTimeImmutable $updateDate;

  /**
   * @var DateTimeImmutable|null
   */
  private ?DateTimeImmutable $modifiedFrom;

  /**
   * @var DateTimeImmutable|null
   */
  private ?DateTimeImmutable $modifiedTo;


  public static function createFromArray(array $data): self
  {

      $object = new static();
      $object->accountId = $data['account_id'];
      $object->otaId = $data['ota_id'];
      $object->otaBookingId = $data['ota_booking_id'];
      $object->linkId = $data['link_id'];
      $object->statusId = $data['status_id'];
      $object->roomtypeId = $data['roomtype_id'];
      $object->planId = $data['plan_id'];
      $object->parentRoomTypeId = $data['parent_room_type_id'];
      $object->number = $data['number'];
      $object->arrival = new \DateTimeImmutable($data['arrival']);
      $object->departure = new \DateTimeImmutable($data['departure']);
      $object->name = $data['name'] ?? null;
      $object->surname = $data['surname'] ?? null;
      $object->email = $data['email'] ?? null;
      $object->phone = $data['phone'] ?? null;
      $object->amount = $data['amount'];
      $object->promoCode = $data['promo_code'] ?? null;
      $object->isFetched = $data['is_fetched'];
      $object->paid = $data['paid'];
      $object->paymentKey = $data['payment_key'] ?? null;
      $object->createDate = new \DateTimeImmutable($data['create_date']);
      $object->updateDate = new \DateTimeImmutable($data['update_date']);
      $object->modifiedFrom = !empty($data['modified_from']) ? new \DateTimeImmutable($data['modified_from']) : null;
      $object->modifiedTo = !empty($data['modified_to']) ? new \DateTimeImmutable($data['modified_to']) : null;

      return $object;
  }


  public function toArray(): array {
    return [
      'accountId' => $this->accountId,
      'otaId' => $this->otaId,
      'otaBookingId' => $this->otaBookingId,
      'linkId' => $this->linkId,
      'statusId' => $this->statusId,
      'roomtypeId' => $this->roomtypeId,
      'planId' => $this->planId,
      'parentRoomTypeId' => $this->parentRoomTypeId,
      'number' =>  $this->number,
      'arrival' => $this->arrival->format('Y-m-d H:i:s'),
      'departure' => $this->departure->format('Y-m-d H:i:s'),
      'name' => $this->name,
      'surname' => $this->surname,
      'email' => $this->email,
      'phone' => $this->phone,
      'amount' => $this->amount,
      'promoCode' => $this->promoCode,
      'isFetched' => $this->isFetched,
      'paid' => $this->paid,
      'paymentKey' => $this->paymentKey,
      'createDate' => $this->createDate->format('Y-m-d H:i:s'),
      'updateDate' => $this->updateDate->format('Y-m-d H:i:s'),
      'modifiedFrom' => $this->modifiedFrom ? $this->modifiedFrom->format('Y-m-d H:i:s') : null,
      'modifiedTo' => $this->modifiedTo ? $this->modifiedTo->format('Y-m-d H:i:s') : null,

    ];
  }


  public function getAccountId(): int {
    return $this->accountId;
  }

  public function getOtaId(): int {
    return $this->otaId;
  }

  public function getOtaBookingId(): int {
    return $this->otaBookingId;
  }

  public function getLinkId(): int {
    return $this->linkId;
  }

  public function getStatusId(): int {
    return $this->statusId;
  }

  public function getRoomtypeId(): int {
    return $this->roomtypeId;
  }

  public function getPlanId(): int {
    return $this->planId;
  }

  public function getParentRoomTypeId(): int {
    return $this->parentRoomTypeId;
  }

  public function getNumber(): string {
    return $this->number;
  }

  public function getArrival(): DateTimeImmutable {
    return $this->arrival;
  }

  public function getDeparture(): DateTimeImmutable {
    return $this->departure;
  }

  public function getName(): ?string {
    return $this->name;
  }

  public function getSurname(): ?string {
    return $this->surname;
  }

  public function getEmail(): ?string {
    return $this->email;
  }

  public function getPhone(): ?string {
    return $this->phone;
  }

  public function getAmount(): float {
    return $this->amount;
  }

  public function getPromoCode(): ?string {
    return $this->promoCode;
  }

  public function isFetched(): bool {
    return $this->isFetched;
  }

  public function getPaid(): int {
    return $this->paid;
  }

  public function getPaymentKey(): ?string {
    return $this->paymentKey;
  }

  public function getCreateDate(): DateTimeImmutable {
    return $this->createDate;
  }

  public function getUpdateDate(): DateTimeImmutable {
    return $this->updateDate;
  }

  public function getModifiedFrom(): ?DateTimeImmutable {
    return $this->modifiedFrom;
  }

  public function getModifiedTo(): ?DateTimeImmutable {
    return $this->modifiedTo;
  }


}
