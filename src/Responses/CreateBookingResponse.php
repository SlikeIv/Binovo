<?
namespace Slikeiv\Binovo\Responses;


use Slikeiv\Binovo\DataObjects\CreateBookingResult;


class CreateBookingResponse
{

  /**
   * @var CreateBookingResult[]
   */
  private array $createdBookings;


  public static function createFromArray(array $response): self
  {

      $object = new static();
      $object->createdBookings = [];
      if(is_array($response['created_bookings'])) {
        foreach ($response['created_bookings'] as $key => $_booking) {
            $object->createdBookings[] = CreateBookingResult::createFromArray($_booking);
        }
      }
      return $object;
  }


  public function toArray(): array {
      $arr = [];
      foreach ($this->createdBookings as $key => $_booking) {
        $arr[] = $_booking->toArray();
      }
      return $arr;
  }


  public function getCreatedBookings(): array {
    return $this->createdBookings;
  }



}
