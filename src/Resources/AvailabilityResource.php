<?
namespace Slikeiv\Binovo\Resources;

use Illuminate\Http\Client\Response;
use Slikeiv\Binovo\APIBinovo;
use Slikeiv\Binovo\Requests\AvailabilityListRequest;
use Slikeiv\Binovo\Responses\AvailabilityListResponse;


class AvailabilityResource {

  private APIBinovo $service;

  public function __construct(APIBinovo $service) {
    $this->service = $service;
  }


  /**
   * Метод API позволяет получить доступное количество номеров по всем категориям аккаунта, либо по категориям, указанным в фильтре, на каждую дату. В ответ будет возвращен массив записей о наличии.
   * @method list
   * @return AvailabilityListResponse
   */
  public function list(AvailabilityListRequest $request): AvailabilityListResponse
  {
    $reponse = $this->service->get($this->service->withBaseUrl(), "/v1/api/availability" , $request->toArray());
    $responseArr = $reponse->json();
    $reponse = AvailabilityListResponse::createFromArray($responseArr);
    return $reponse;
  }


}
