<?
namespace Slikeiv\Binovo;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Slikeiv\Binovo\Resources\AvailabilityResource;
use Slikeiv\Binovo\Resources\AuthResource;
use Slikeiv\Binovo\Resources\PlansDataResource;
use Slikeiv\Binovo\Resources\ChannelManagerBookingsResource;
use Slikeiv\Binovo\Exceptions\BinovoClientException;
use Slikeiv\Binovo\Exceptions\BinovoServerException;
use Slikeiv\Binovo\Exceptions\BinovoClientUnauthorizedException;
use Slikeiv\Binovo\Exceptions\BinovoClientMethodNotFoundException;
use Slikeiv\Binovo\Exceptions\BinovoClientValidationException;


class APIBinovo {

	/**
	 * @var string
	 */
	private string $baseUrl;

	/**
	 * @var string
	 */
	private string $apiToken;


	public function __construct(string $baseUrl,  string $apiToken=null) {
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}


	public function setApiToken(string $apiToken):void {
		$this->apiToken = $apiToken;
	}

	public function getApiToken():?string {
		 return $this->apiToken;
	}

	public function availability(): AvailabilityResource
	{
			return new AvailabilityResource($this);
	}


	public function auth(): AuthResource
	{
			return new AuthResource($this);
	}


	public function plansData(): PlansDataResource
	{
			return new PlansDataResource($this);
	}


	public function channelManagerBookings(): ChannelManagerBookingsResource
	{
			return new ChannelManagerBookingsResource($this);
	}


	// public function buildRequestWithToken(): PendingRequest
	// {
	//  		return $this->withBaseUrl()->timeout(60)->withToken($this->apiToken);
	// }

	 public function withBaseUrl(): PendingRequest
	 {
		 	return Http::baseUrl($this->baseUrl);
	 }

	 public function get(PendingRequest $request, string $url, array $params = []): Response
	 {


			$params["token"] = $this->apiToken;
			$response = $request->get($url, $params);
			$this->check_response($response);
		 	return $response;
	 }

	 public function post(PendingRequest $request, string $url, array $payload = []): Response
	 {
			 if(!empty($this->apiToken)) {
				  $payload['token'] = $this->apiToken;
			 }

		   $response = $request->post($url, $payload);
			 $this->check_response($response);
		 	 return $response;
	 }

	 public function put(PendingRequest $request, string $url, array $payload = []): Response
	 {
		   $payload['token'] = $this->apiToken;
		   $response = $request->put($url, $payload);
			 $this->check_response($response);
		 	 return $response;
	 }

	/**
	 * @method check_response
	 * @param  Response  $response
	 */
	 private function check_response(Response $response):void {

			 if(!$response->successful()){
					if($response->clientError()){
						$statusCode = $response->status();
						print("statusCode->  ".$statusCode);
						switch ($statusCode) {
							case 401:
								throw new BinovoClientUnauthorizedException("Ошибка авторизации, передан невалидный токен авторизации ", $response->status(), $response->body());
								break;
							case 404:
								throw new BinovoClientMethodNotFoundException("Метод API, либо какая-то сущность, необходимая для обработки запроса не найдена.", $response->status(), $response->body());
								break;
							case 406:
								throw new BinovoClientValidationException("Ошибка валидации ", $response->status(),  $response->body());
								break;
							default:
								throw new BinovoClientException("Ошибка клиента ", $response->status(), $response->body());
								break;
						}

					}else if($response->serverError()){
							throw new BinovoServerException("Ошибка сервера ".$response->status(), $response->body());
					}
			}
	 }

}
