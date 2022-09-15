<?
namespace Slikeiv\Binovo\Responses;


class AuthResponse
{

  /**
   * @var string
   */
  private string $token;


  public static function createFromArray(array $response): self
  {

      $object = new static();
      $object->token = $response['token'];
      return $object;
  }


  public function getToken(): string {
    return $this->token;
  }

  public function toArray(): array {
    return [
      "token" => $object->token,
    ];
  }


}
