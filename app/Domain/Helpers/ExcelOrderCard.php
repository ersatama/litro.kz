<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;
use App\Domain\Services\CarBrandService;
use App\Domain\Services\CarModelService;
use App\Domain\Services\CityService;
use App\Domain\Services\OrderCardService;
use App\Domain\Services\UserService;

class ExcelOrderCard
{
    const DATA  =   [
        'Дата активации',
        'Срок действия***',
        '№ присвоенной карты',
        'Город',
        'Тип карты',
        '?Статус карты',
        'Фамилия Владельца 1',
        'Имя Владельца 1',
        'Отчество Владельца 1',
        'Дата рождения  Владельца 1',
        'Пол Владельца 1',
        'Марка Владельца 1',
        'Модель Владельца 1',
        'Год выпуска Владельца 1',
        'Гос. Номер* Владельца 1',
        'Vin code Владельца 1',
        'Телефон Владельца 1',
        'Email Владельца 1',
        'Фамилия Владельца 2',
        'Имя Владельца 2',
        'Отчество Владельца 2',
        'День рождения Владельца 2',
        'Пол Владельца 2',
        'Марка Владельца 2',
        'Модель Владельца 2',
        'Год выпуска Владельца 2',
        'Гос. Номер* Владельца 2',
        'Vin code Владельца 2',
        'Телефон Владельца 2',
        'Email Владельца 2',
        'Создать учетную запись в приложении да/нет**'
    ];

    protected OrderCardService $orderCardService;
    protected CityService $cityService;
    protected UserService $userService;
    protected CarBrandService $carBrandService;
    protected CarModelService $carModelService;

    public function __construct(OrderCardService $orderCardService, CityService $cityService, UserService $userService, CarBrandService $carBrandService, CarModelService $carModelService)
    {
        $this->orderCardService =   $orderCardService;
        $this->cityService  =   $cityService;
        $this->userService  =   $userService;
        $this->carBrandService  =   $carBrandService;
        $this->carModelService  =   $carModelService;
    }

    public function clearText(string $text): array|string|null
    {
        return preg_replace('/\s\s+/', ' ', preg_replace('/\r|\n/', '', trim($text)));
    }

    public function checkHeader($data): array
    {
        $arr    =   [];
        if (sizeof($data) < sizeof(self::DATA)) {
            return $data->toArray();
        }
        for ($i = 0; $i < sizeof(self::DATA); $i++) {
            if ($data[$i]) {
                $header =   $this->clearText($data[$i]);
                if ($header !== $this->clearText(self::DATA[$i])) {
                    $arr[]  =   $header;
                }
            } else {
                $arr[]  =   $data[$i];
            }
        }
        return $arr;
    }

    public function create($row): array
    {
        $data   =   [];
        $row    =   $row->toArray();
        for ($i = 0; $i < sizeof(self::DATA); $i++) {
            if (array_key_exists($i, $row)) {
                $data[$i]   =   $row[$i];
            }
        }

        if ($this->orderCardService->orderCardRepository->getByNumber($row[2])) {
            $data[2]    =   [$row[2]];
        }

        if (!$this->cityService->cityRepository->getByTitle($row[3])) {
            $data[3]    =   [$row[3]];
        }

        if (!$row[16]) {
            $data[16]   =   [$row[16]];
        } elseif ($phone = $this->phoneConvert($row[16])) {
            if ($user1 = $this->userService->userRepository->getByPhone($phone)) {
                if ($this->textConvert($user1->{Contract::FIRST_NAME}) !== $this->textConvert($row[7])) {
                    $data[7]    =   [$row[7]];
                }
                if ($this->textConvert($user1->{Contract::LAST_NAME}) !== $this->textConvert($row[6])) {
                    $data[6]    =   [$row[6]];
                }
                if ($this->birthdateConvert($user1->{Contract::BIRTHDATE}) !== $row[9]) {
                    $data[9]    =   [$row[9]];
                }
                if ($this->textConvert($user1->{Contract::GENDER}) !== $this->textConvert($row[10])) {
                    $data[10]   =   [$row[10]];
                }
                if ($user1->{Contract::EMAIL} && $row[19] && $user1->{Contract::EMAIL} !== trim($row[17])) {
                    $data[17]   =   [$row[17]];
                }
            }
        }

        if ($row[28]) {
            $phone  =   $this->phoneConvert($row[28]);
            if ($phone) {
                $data[28]  =   [$row[28]];
            } elseif ($user2 = $this->userService->userRepository->getByPhone($phone)) {
                if ($this->textConvert($user2->{Contract::FIRST_NAME}) !== $this->textConvert($row[19])) {
                    $data[19]   =   [$row[19]];
                }
                if ($this->textConvert($user2->{Contract::LAST_NAME}) !== $this->textConvert($row[18])) {
                    $data[18]   =   [$row[18]];
                }
                if ($this->birthdateConvert($user2->{Contract::BIRTHDATE}) !== $row[21]) {
                    $data[21]   =   [$row[21]];
                }
                if ($this->textConvert($user2->{Contract::GENDER}) !== $this->textConvert($row[22])) {
                    $data[22]   =   [$row[22]];
                }
                if ($user2->{Contract::EMAIL} && $row[29] && $user2->{Contract::EMAIL} !== trim($row[29])) {
                    $data[29]   =   [$row[29]];
                }
            }
        }

        if (!$this->carBrandService->carBrandRepository->getByTitle(trim($row[11]))) {
            $data[11]   =   [trim($row[11])];
        }

        if (!$this->carModelService->carModelRepository->getByTitle(trim($row[12]))) {
            $data[12]   =   [trim($row[12])];
        }
        return $data;
    }

    public function textConvert($text): string
    {
        return trim(strtolower($text));
    }

    public function phoneConvert(string $phone): ?string
    {
        $phone  =   preg_replace('/\s+/', '', preg_replace('/\r|\n/', '', trim($phone)));
        if ($phone[0] === '7' || $phone[0] === '8') {
            $phone  =   '+7'.substr($phone, 1);
        }
        $phone  =   str_replace(['_','(',')','-','[',']'],'',$phone);
        if (preg_match( '/^\+\d(\d{3})(\d{3})(\d{2})(\d{2})$/', $phone, $matches))
        {
            return '+7 ' . $matches[1] . ' ' .$matches[2] . ' ' . $matches[3] . ' ' . $matches[4];
        }
        return null;
    }

    public function birthdateConvert($birthdate)
    {
        if ($birthdate) {
            $date   =   explode(' ', $birthdate);
            $date   =   explode('-',$date[0]);
            return $date[0] . '.' . $date[1] . '.' . $date[2];
        }
        return $birthdate;
    }
}
