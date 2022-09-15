<?
namespace Slikeiv\Binovo\Responses;


use Slikeiv\Binovo\DataObjects\CreateBookingResult;
use Slikeiv\Binovo\DataObjects\CanceledBookingResult;


class EditBookingResponse
{

  /**
   * @var CreateBookingResult[]
   */
  private array $createdBookings;

  /**
   * @var CanceledBookingResult[]
   */
  private array $canceledBookings;


  public static function createFromArray(array $response): self
  {

      $object = new static();
      $object->createdBookings = [];
      if(is_array($response['created_bookings'])) {
        foreach ($response['created_bookings'] as $key => $_booking) {
            $object->createdBookings[] = CreateBookingResult::createFromArray($_booking);
        }
      }

      if(is_array($response['canceled_bookings'])) {
        foreach ($response['canceled_bookings'] as $key => $_booking) {
            $object->canceledBookings[] = CanceledBookingResult::createFromArray($_booking);
        }
      }
      return $object;
  }


  public function toArray(): array {
      $arr = ["created_bookings" => [], "canceled_bookings" => []];
      foreach ($this->createdBookings as $key => $_booking) {
        $arr["created_bookings"][] = $_booking->toArray();
      }
      foreach ($this->canceledBookings as $key => $_booking) {
        $arr["canceled_bookings"][] = $_booking->toArray();
      }
      return $arr;
  }


  public function getCreatedBookings(): array {
    return $this->createdBookings;
  }

  public function getCanceledBookings(): array {
    return $this->canceledBookings;
  }



}
