<?
namespace Slikeiv\Binovo\Resources;

use Illuminate\Http\Client\Response;
use Slikeiv\Binovo\APIBinovo;
use Slikeiv\Binovo\Requests\AuthRequest;
use Slikeiv\Binovo\Responses\AuthResponse;


class AuthResource {

  private APIBinovo $service;

  public function __construct(APIBinovo $service) {
    $this->service = $service;
  }


  /**
   * Метод API позволяет авторизовать пользователя по его логину и паролю. В ответ будет возвращен токен авторизации,
   * который нужно использовать для последующих обращений к API методам, требующим авторизации (token в параметрах запросов).
   * После истечения 1 часа, начиная с момента последнего использования, токен становится недействительным.
   * Разрешено генерировать неограниченное количество токенов на одну пару логин-пароль. Ранее выданный токен при генерации нового не аннулируется.
   * @method auth
   * @return AuthResponse
   */
  public function token(AuthRequest $request): AuthResponse
  {
    $reponse = $this->service->post($this->service->withBaseUrl(), "/v1/api/auth", $request->toArray());
    $responseArr = $reponse->json();
    $reponse = AuthResponse::createFromArray($responseArr);

    if(!empty($reponse->getToken())) {
        $this->service->setApiToken($reponse->getToken());
    }

    return $reponse;
  }


}
