<?
namespace Slikeiv\Binovo\Requests;

use Slikeiv\Binovo\DataObjects\BookingData;


class CreateBookingRequest
{

  private int $accountId;

  private BookingData $bookingData;

  public function __construct(
      int $accountId,
      BookingData $bookingData
  ){
      $this->accountId = $accountId;
      $this->bookingData = $bookingData;
  }

  public function toArray(): array
  {
     return [
       'account_id' => $this->accountId,
       'booking_data' => $this->bookingData->toArray(),
     ];
  }

}
