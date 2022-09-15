<?
namespace Slikeiv\Binovo\DataObjects;

class BookingData
{

  const ALLOWED_STATUS = [1, 2];  // 1 - новое, 2 - отмена.
  const ALLOWED_LANGUAGE = ['ru', 'en'];

  /**
   * @var string
   */
  private string $otaId;

  /**
   * @var string
   */
  private string $otaBookingId;

  /**
   * @var integer
   */
  private int $statusId;

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
   * @var string|null
   */
  private ?string $comment;

  /**
   * @var string|null
   */
  private ?string $lang;


  /**
   * @var RoomType[]
   */
  private array $roomTypes;


  public function __construct(
      string $otaId,
      string $otaBookingId,
      int $statusId,
      array $roomTypes,
      ?string $name,
      ?string $surname,
      ?string $email,
      ?string $phone,
      ?string $comment,
      ?string $lang
  ){
    $this->otaId = $otaId;
    $this->otaBookingId = $otaBookingId;
    $this->statusId = $statusId;
    $this->roomTypes = $roomTypes;
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
    $this->phone = $phone;
    $this->comment = $comment;

    //check lang property
    if(!empty($lang) ) {
        if (!in_array($lang, self::ALLOWED_LANGUAGE))  throw new \InvalidArgumentException("not allowed language");
        $this->lang = $lang;
    }

    //check statusId property
    if(!empty($statusId) ) {
        if (!in_array($statusId, self::ALLOWED_STATUS))  throw new \InvalidArgumentException("not allowed status");
        $this->statusId = $statusId;
    }

    //check roomTypes property
    if(count($this->roomTypes) == 0 ) {
      throw new \InvalidArgumentException("roomTypes array is empty");
    }else{
      foreach ($this->roomTypes as $key => $_roomType) {
        if(!($_roomType  instanceof  RoomType)) {
              throw new \InvalidArgumentException("roomTypes[".$key."] is not intance of class RoomType");
        }
      }
    }
  }

  public function toArray(): array {
    return [
      'ota_id' => $this->otaId,
      'ota_booking_id' => $this->otaBookingId,
      'status_id' => $this->statusId,
      'room_types' => array_map(function($roomType) {
          return $roomType->toArray();
      }, $this->roomTypes),
      'name' => $this->name,
      'surname' => $this->surname,
      'email' => $this->email,
      'phone' => $this->phone,
      'comment' => $this->comment,
      'lang' => $this->lang,
    ];
  }


  public function getOtaId(): string {
    return $this->otaId;
  }

  public function getOtaBookingId(): string {
    return $this->otaBookingId;
  }

  public function getStatusId(): int {
    return $this->statusId;
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

  public function getComment(): ?string {
    return $this->comment;
  }

  public function getLang(): ?string {
    return $this->lang;
  }

  public function getRoomTypes(): array {
    return $this->roomTypes;
  }

}
