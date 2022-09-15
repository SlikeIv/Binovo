<?
namespace Slikeiv\Binovo\Requests;

use \DateTimeImmutable;

class PlansDataRequest
{

  const AVAILABLE_FIELDS = [
      'price',
      'min_stay',
      'min_stay_arrival',
      'max_stay',
      'closed',
      'closed_arrival',
      'closed_departure',
  ];

  private int $accountId;

  private DateTimeImmutable $dfrom;

  private DateTimeImmutable $dto;

  private array $plans;

  private array $roomtypes;

  private array $fields;

 public function __construct(
    int $accountId,
    DateTimeImmutable $dfrom,
    DateTimeImmutable $dto,
    ?array $plans,
    ?array $roomtypes,
    ?array $fields
  )
  {
    $this->accountId = $accountId;  
    $this->dfrom = $dfrom;
    $this->dto = $dto;

    if(!empty( $plans)) {
      $this->plans = array_map(function ($plan){
          if (!is_int($plan))  throw new  \InvalidArgumentException('plans item '. $plan . ' is not integer type');
          return $plan;
      }, $plans);
    }

    if(!empty( $roomtypes)) {
      $this->roomtypes = array_map(function ($roomtype){
          if (!is_int($roomtype))  throw new  \InvalidArgumentException('roomtype item '. $roomtype . ' is not integer type');
          return $roomtype;
      }, $roomtypes);
    }

    if(!empty( $fields) ) {
      $this->fields = array_map(function ($field){
          if (!in_array($field, self::AVAILABLE_FIELDS ))  throw new  \InvalidArgumentException('not available field '. $field);
          return $field;
      }, $fields);
   }

  }

 public function toArray(): array
 {
   return [
     'account_id' => $this->accountId,
     'dfrom' => $this->dfrom->format('Y-m-d'),
     'dto' => $this->dto->format('Y-m-d'),
     'plans' => $this->plans  ?? null,
     'roomtypes' => $this->roomtypes ?? null,
     'fields' => $this->fields ?? null,
   ];
 }

}
