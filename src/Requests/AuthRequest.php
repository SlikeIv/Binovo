<?
namespace Slikeiv\Binovo\Requests;


class AuthRequest
{
    public function __construct(string $username,string $password)
    {
      $this->username = $username;
      $this->password = $password;
    }

    public function toArray(): array
    {
      return [
       'username' => $this->username,
       'password' =>$this->password,
      ];
    }

}
