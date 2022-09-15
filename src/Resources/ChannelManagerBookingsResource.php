<?
namespace Slikeiv\Binovo\Resources;

use Illuminate\Http\Client\Response;
use Slikeiv\Binovo\APIBinovo;
use Slikeiv\Binovo\Requests\CreateBookingRequest;
use Slikeiv\Binovo\Responses\CreateBookingResponse;
use Slikeiv\Binovo\Requests\EditBookingRequest;
use Slikeiv\Binovo\Responses\EditBookingResponse;


class ChannelManagerBookingsResource {

    private APIBinovo $service;

    public function __construct(APIBinovo $service) {
      $this->service = $service;
    }


  /**
   *  Контроллер доступен только для пользователей с ролью channel_manager.
   *  Метод API позволяет добавить новое бронирование.
   *  В ответ будет возвращен список созданных бронирований. Если бронируется несколько номеров (в том числе одной категории), то создается группа бронирований.
   *  Создание бронирования вызывает изменения наличия в модуле бронирования и в менеджере каналов OTA.
   *  Данный контроллер игнорирует доступное наличие по категории номеров на бронируемые даты и позволяет создавать овербукинги.
   * @method createBooking
   * @return CreateBookingResponse
   */
  public function addBooking(CreateBookingRequest $request): CreateBookingResponse
  {
    $response = $this->service->post($this->service->withBaseUrl(), "​/v1/api/channel_manager_bookings", $request->toArray());
    $responseArr = $reponse->json();
    $response = CreateBookingResponse::createFromArray($responseArr);
    return $response;
  }


  /**
   *  Контроллер доступен только для пользователей с ролью channel_manager.
   *  Метод API позволяет изменить существующее бронирование. Изменение происходит путем отмены прошлого бронирования и создания нового. Контроллер предназначен только для работы с бронированиями от OTA.
   *  Если переданный статус бронирования - отмена, то бронирование будет отменено, иначе бронирование будет отменено и вместо него создано новое согласно переданным параметрам.
   *  В ответ будет возвращен список созданных и отмененных бронирований. Изменение бронирования вызывает изменения наличия в модуле бронирования и в менеджере каналов OTA.
   *  Данный контроллер игнорирует доступное наличие по категории номеров на бронируемые даты и позволяет создавать овербукинги при модификации с расширением дат бронирования.
   *  Модифицированные бронирования будут иметь заполненные поля modified_from и modified_to. Если модифицируется единичное бронирование, то старое отмененное бронирование и новое будут связаны в группу.
   * @method editBooking
   * @return EditBookingResponse
   */
  public function editBooking(EditBookingRequest $request): EditBookingResponse
  {
    $response = $this->service->put($this->service->withBaseUrl(), "/v1/api/channel_manager_bookings" , $request->toArray());
    $responseArr = $reponse->json();
    $response = EditBookingResponse::createFromArray($responseArr);
    return $response;
  }


}
