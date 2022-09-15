<?
namespace Slikeiv\Binovo\Requests;

use \DateTimeImmutable;

class AvailabilityListRequest
{

 private int $accountId;

 private DateTimeImmutable $dfrom;

 private DateTimeImmutable $dto;

 private array $roomtypes;

 private int $forOta;

 public function __construct(
    int $accountId,
    DateTimeImmutable $dfrom,
    DateTimeImmutable $dto,
    ?array $roomtypes,
    int $forOta = 0
  )
  {
    $this->accountId = $accountId;
    $this->dfrom = $dfrom;
    $this->dto = $dto;
    $this->roomtypes = array_map(function ($roomtype){
        if (!is_int($roomtype))  throw new  \InvalidArgumentException('roomtype item '. $roomtype . ' is not integer type');
        return $roomtype;
    }, $roomtypes);
    $this->forOta = $forOta;
  }

 public function toArray(): array
 {
   return [
     'account_id' => $this->accountId,
     'dfrom' => $this->dfrom->format('Y-m-d'),
     'dto' => $this->dto->format('Y-m-d'),
     'roomtypes' => $this->roomtypes,
     'for_ota' =>  $this->forOta,
   ];
 }

}
