<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Services\CityService;
use App\Domain\Services\UserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderCardSaveExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected array $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data =   $data;
    }

    /**
     * Execute the job.
     *
     * @param UserService $userService
     * @param CityService $cityService
     * @return void
     */
    public function handle(UserService $userService, CityService $cityService): void
    {
        //["2021.09.09","2022.09.09",29000000,"Алматы","Mycar Finance","Активна","Колмыченко","Наталья","Анатольевна","2022.02.22","female","GAC","S3",2021,"-","-",77779005710,null,null,null,null,null,null,null,null,null,null,null,null,null,"да"]]
        foreach ($this->data as &$value) {
            $city   =   $cityService->cityRepository->getByTitle($value[3]);
            $user   =   $userService->createByExcel([
                Contract::ROLE_ID       =>  1,
                Contract::CITY_ID       =>  $city ? $city->{Contract::ID} : null,
                Contract::PHONE         =>  $value[16],
                Contract::EMAIL         =>  $value[17],
                Contract::FIRST_NAME    =>  $value[7],
                Contract::LAST_NAME     =>  $value[6],
                Contract::PATRONYMIC    =>  $value[8],
                Contract::BIRTHDATE     =>  $value[9],
                Contract::PASSWORD      =>  12345678,
                Contract::IS_BLOCKED    =>  false,
                Contract::GENDER        =>  in_array($value[10],[Contract::MALE,Contract::FEMALE]) ? $value[10]: Contract::MALE,
                Contract::IS_VLIFE_USER =>  false,
            ]);
            if ($value[29]) {
                $city   =   $cityService->cityRepository->getByTitle($value[3]);
                $user2  =   $userService->createByExcel([
                    Contract::ROLE_ID       =>  1,
                    Contract::CITY_ID       =>  $city ? $city->{Contract::ID} : null,
                    Contract::PHONE         =>  $value[16],
                    Contract::EMAIL         =>  $value[17],
                ]);
            }
            Log::info('data',[$value]);
        }
    }
}
