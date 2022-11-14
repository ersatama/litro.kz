<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Services\CarBrandService;
use App\Domain\Services\CarModelService;
use App\Domain\Services\CityService;
use App\Domain\Services\OrderCardService;
use App\Domain\Services\UserService;
use App\Imports\OrderCardImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class OrderCardUploadExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected array $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data =   $data;
    }

    /**
     * Execute the job.
     *
     * @param OrderCardService $orderCardService
     * @param CityService $cityService
     * @param UserService $userService
     * @param CarBrandService $carBrandService
     * @param CarModelService $carModelService
     * @return void
     */
    public function handle(OrderCardService $orderCardService, CityService $cityService, UserService $userService, CarBrandService $carBrandService, CarModelService $carModelService): void
    {
        Excel::import(new OrderCardImport($orderCardService, $cityService,  $userService,  $carBrandService, $carModelService, $this->data[Contract::TIME]), public_path().'/'.$this->data[Contract::NAME]);
        unlink(public_path().'/'.$this->data[Contract::NAME]);
    }
}
