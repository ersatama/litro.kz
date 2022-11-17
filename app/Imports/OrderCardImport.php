<?php

namespace App\Imports;

use App\Domain\Contracts\Contract;
use App\Domain\Helpers\ExcelOrderCard;
use App\Domain\Services\CarBrandService;
use App\Domain\Services\CarModelService;
use App\Domain\Services\CityService;
use App\Domain\Services\OrderCardService;
use App\Domain\Services\UserService;
use App\Events\OrderCardEvent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class OrderCardImport implements ToCollection
{
    protected OrderCardService $orderCardService;
    protected CityService $cityService;
    protected UserService $userService;
    protected CarBrandService $carBrandService;
    protected CarModelService $carModelService;
    protected string $time;
    public function __construct(OrderCardService $orderCardService, CityService $cityService, UserService $userService, CarBrandService $carBrandService, CarModelService $carModelService, string $time)
    {
        $this->orderCardService =   $orderCardService;
        $this->cityService  =   $cityService;
        $this->userService  =   $userService;
        $this->carBrandService  =   $carBrandService;
        $this->carModelService  =   $carModelService;
        $this->time =   $time;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $excelOrderCardHelper   =   new ExcelOrderCard($this->orderCardService, $this->cityService, $this->userService, $this->carBrandService, $this->carModelService);
        $data   =   [];
        $status =   true;
        $count  =   1;
        $size   =   sizeof($collection->toArray());
        foreach ($collection as $row)
        {
            if ($status) {
                $status =   false;
                $header =   $excelOrderCardHelper->checkHeader($row);
                if (sizeof($header) > 0) {
                    event(new OrderCardEvent(json_encode([
                        Contract::SIZE  =>  $size,
                        Contract::COUNT =>  $count,
                        Contract::TIME  =>  $this->time,
                        Contract::DATA  =>  []
                    ])));
                    break;
                }
            } else if (sizeof($row) >= 31) {
                $data[] =   $excelOrderCardHelper->create($row);
                $count++;
            } else {
                break;
            }
            if (sizeof($data) === 10) {
                event(new OrderCardEvent(json_encode([
                    Contract::SIZE  =>  $size,
                    Contract::COUNT =>  $count,
                    Contract::TIME  =>  $this->time,
                    Contract::DATA  =>  $data
                ])));
                $data   =   [];
            }
        }

        if (sizeof($data) > 0) {
            event(new OrderCardEvent(json_encode([
                Contract::SIZE  =>  $size,
                Contract::COUNT =>  $count,
                Contract::TIME  =>  $this->time,
                Contract::DATA  =>  $data
            ])));
        }

    }
}
