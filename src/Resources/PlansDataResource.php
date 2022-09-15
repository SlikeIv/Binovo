<?
namespace Slikeiv\Binovo\Resources;

use Illuminate\Http\Client\Response;
use Slikeiv\Binovo\APIBinovo;
use Slikeiv\Binovo\Requests\PlansDataRequest;
use Slikeiv\Binovo\Responses\PlansDataResponse;


class PlansDataResource {

    private APIBinovo $service;

    public function __construct(APIBinovo $service) {
      $this->service = $service;
    }


  /**
   *  Метод API позволяет получить совокупную информацию по ценам и ограничениям одним запросом.
   *  Есть возможность фильтровать данные по идентификаторам тарифов и категорий.
   *  Можно запросить только заданные поля (цены и типы ограничений).
   *  Необходимо указать период, за который требуется получить данные.
   * @method list
   * @return PlansDataResponse
   */
  public function list(PlansDataRequest $request): PlansDataResponse
  {
    $response = $this->service->get($this->service->withBaseUrl(), "/v1/api/plans_data" , $request->toArray());
    $responseArr = $reponse->json();
    $response = PlansDataResponse::createFromArray($responseArr);
    return $response;
  }


}
