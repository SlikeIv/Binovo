<?
namespace Slikeiv\Binovo\Exceptions;

use Slikeiv\Binovo\Exceptions\BinovoException;

class BinovoClientException extends BinovoException {

  private $responseBody;

  public function __construct($message, $code = 0, $responseBody=null, Throwable $previous = null) {

      parent::__construct($message, $code, $previous);
  }

   public function __toString() {
       $jsonResponse = json_encode($this->responseBody);
       return ": [{$this->code}]: {$this->message}  {$jsonResponse}\n";
   }

  public function getResposnBody() {
     return $this->responseBody;
  }
}
