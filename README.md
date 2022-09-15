
## Библиотека для работы с Manager (CM) "Bnovo" (v1)
[a link](https://swagger.sandbox.reservationsteps.ru/?urls.primaryName=%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BA%D1%86%D0%B8%D1%8F%20%D0%BF%D0%BE%20%D0%B8%D0%BD%D1%82%D0%B5%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D0%B8%20%D0%B4%D0%BB%D1%8F%20OTA%20-%20%D0%A0%D1%83%D1%81%D1%81%D0%BA%D0%B8%D0%B9)

Реализованы методы:
  - /v1/api/auth
  - /v1/api/availability
  - /v1/api/plans_data
  - /v1/api/channel_manager_bookings


Установка:

- Добавить репозиторий в composer.json проекта

```json

"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/SlikeIv/Binovo.git"
        }
    ]
```

- Установить пакет из репозитория

```console
composer require slikeiv/binovo
```


Использование:


```php

use Slikeiv\Binovo\APIBinovo;
use Slikeiv\Binovo\Exceptions\BinovoClientException;


/**    ------------------------  Авторизация   -------------------------    **/

use Slikeiv\Binovo\Requests\AuthRequest;


$APIBinovo = new APIBinovo("https://api.sandbox.reservationsteps.ru");
try {
  $authRequest = new AuthRequest("Username", "Password");
  $reponse = $APIBinovo->auth()->token($authRequest);
  $apiToken = $reponse->getToken();
} catch (BinovoClientException $e) {
    print_r($e->getResposnBody());
    print($e);
}

```
После успешного выполнения запроса на получение токена, токен сохраняется, при последующих запросах будет подставляться автоматически , указывать где-либо в запросах не нужно




```php

use Slikeiv\Binovo\Requests\PlansDataRequest;


/**    ------------------------  Цены и ограничения   -------------------------    **/

$plansDataRequest = new PlansDataRequest(
  1,  //account_id
  new \DateTimeImmutable('2020-09-01'),
  new \DateTimeImmutable('2020-09-03'),
  [1,2,3],
  [1,2,3],
  ["price"],
);
$reponse = $APIBinovo->plansData()->list($plansDataRequest);
$plansData = $reponse->getPlansData();

foreach ($plansData as $key => $planData) {
  $roomDataItems = $planData->getRoomDataItems();
  foreach ($roomDataItems as $key => $_roomDataItems) {
      print_r($_roomDataItems->getInfoByDataItems());
  }
}

```



```php


/**    ------------------------  Наличие   -------------------------    **/

use Slikeiv\Binovo\Requests\AvailabilityListRequest;

$availabilityListRequest = new AvailabilityListRequest(
  1, //accountId
  new \DateTimeImmutable('2020-09-01'),
  new \DateTimeImmutable('2020-09-12'),
  [1,2,3],   //roomtypes
  1   //forOta
);
$reponse = $APIBinovo->availability()->list($availabilityListRequest);

```





```php

/**    ------------------------  Добавление нового бронирования   -------------------------    **/

use Slikeiv\Binovo\Requests\CreateBookingRequest;
use Slikeiv\Binovo\DataObjects\BookingData;
use Slikeiv\Binovo\DataObjects\RoomType;
use Slikeiv\Binovo\DataObjects\BookingExtra;
use Slikeiv\Binovo\DataObjects\BookingExtra\GuestsInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\LoyaltyInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\OtaInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ServicesInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ExtraFeesInfo;
use Slikeiv\Binovo\DataObjects\RoomPriceByDate;




  $guestsInfo = new GuestsInfo(
    ['Ivan', 'Sasha', 'Roma'],  //list
    3, //number
    true, //isSmoking
    ["TV", "bashroom"], //requests
  );

  $loyaltyInfo = new LoyaltyInfo(
    ["booker_is_genius" => true],  //flags
    "221uepqk2" // loyaltyId
  );


  $otaInfo = new OtaInfo(
    "Breakfast is provided at a price of 300 RUB per person per night.\nВ In case of non show, the total price of the booking will be charged.",  //info
    "134041214433", // hotelId
    "Room only", // rateName
    "Test Hotel", // hotelName
    "This apartment has a private entrance, cable TV and electric kettle.", // extraInfo
    "Shower, Bath, TV, Hairdryer, Iron, Kitchenette, Balcony ", // facilities
    "RUB", // currencyCode
    "cash", // payType   cash | non-cash | card | prepay
     2500, // paidSum
     false, // prepay
     "comment for payment", // paymentMethodComment
  );


  $servicesInfo = new ServicesInfo(
    ["Slippers"],  //free
    ["Dinner 3000 (3000 Per person per night)"], // additional
  );

  $extraFeesInfo = new ExtraFeesInfo(
    ["VAT: 1216.666667 RUB"],  //excluded
    ["VAT: 1216.666667 RUB"], // included
  );

  $bookingExtra = new BookingExtra(
    "board decription text",  //board
    [  //rates
      "2022-09-01: 2500 (Standard Rate)",
      "2022-09-02: 2300 (Standard Rate)",
      "2022-09-03: 2100 (Standard Rate)"
    ],
    $guestsInfo,
    $loyaltyInfo,
    $otaInfo,
    $servicesInfo,
    $extraFeesInfo,
    1314   //otaCommission
  );


  $roomPriceByDate1 = new RoomPriceByDate(
       new \DateTimeImmutable('2022-09-01'), //date
       2500
  );
  $roomPriceByDate2 = new RoomPriceByDate(
       new \DateTimeImmutable('2022-09-02'), //date
       2300
  );
  $roomPriceByDate3 = new RoomPriceByDate(
       new \DateTimeImmutable('2022-09-03'), //date
       2100
  );
  $roomType1 = new RoomType(
    new \DateTimeImmutable('2022-09-01'),
    new \DateTimeImmutable('2022-09-03'),
    1, //roomTypeId
    2, //planId
    3, //count
    2, //adults
    1, //children
    2500, //amount
    [$roomPriceByDate1, $roomPriceByDate2, $roomPriceByDate3], //prices
    155,  // penalty
    $bookingExtra //BookingExtra
    );

  $roomType2 = clone $roomType1;
  $bookingData = new BookingData('expedia', '1202924150', 1, [$roomType1,   $roomType2], "Name", "Surname", "MyMail@mail.net", '+7(999)111-22-33', 'comment text...', 'ru');

  $createBookingRequest = new CreateBookingRequest(
    1,  //accountId
    $bookingData  //booking_data
  );


  $reponse = $APIBinovo->channelManagerBookings()->addBooking($createBookingRequest);

  // Можно делать обход по объекту, а можно отобразить как массив (работает для всех response в других методах)  
  $reponse->toArray();

```



```php

/**    ------------------------  Изменение\отмена нового бронирования   -------------------------    **/

use Slikeiv\Binovo\Requests\EditBookingRequest;
use Slikeiv\Binovo\DataObjects\BookingData;
use Slikeiv\Binovo\DataObjects\RoomType;
use Slikeiv\Binovo\DataObjects\BookingExtra;
use Slikeiv\Binovo\DataObjects\BookingExtra\GuestsInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\LoyaltyInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\OtaInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ServicesInfo;
use Slikeiv\Binovo\DataObjects\BookingExtra\ExtraFeesInfo;
use Slikeiv\Binovo\DataObjects\RoomPriceByDate;


  // ....... все тоже самое как и для метода addBooking

  $editBookingRequest = new EditBookingRequest(
    98776542321,  //accountId
    $bookingData  //booking_data
  );


try {
  $reponse = $APIBinovo->channelManagerBookings()->editBooking($editBookingRequest);
  print_r( $reponse->getCreatedBookings());
  print_r( $reponse->getCanceledBookings());
} catch (BinovoClientException $e) {
    print_r($e->getResposnBody());
    print($e);
}


```
