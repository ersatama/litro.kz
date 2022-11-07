<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Helpers\Kolesa;
use App\Models\CarModel;
use DiDom\Exceptions\InvalidSelectorException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CarModelAveragePrice as CarModelAveragePriceModel;

class CarModelAveragePrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected CarModel $carModel;
    protected int $year;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CarModel $carModel, int $year)
    {
        $this->carModel =   $carModel;
        $this->year     =   $year;
    }

    /**
     * Execute the job.
     *
     * @param Kolesa $kolesa
     * @return void
     * @throws InvalidSelectorException
     */
    public function handle(Kolesa $kolesa): void
    {
        CarModelAveragePriceModel::updateOrCreate(
            [
                Contract::CAR_MODEL_ID  =>  $this->carModel->{Contract::ID},
                Contract::YEAR  =>  $this->year,
            ],
            [
                Contract::AVERAGE_PRICE =>  $kolesa->getAveragePrice(
                    $this->carModel->{Contract::CAR_BRAND}->{Contract::TITLE},
                    $this->carModel->{Contract::TITLE},
                    $this->year
                )
            ]
        );
    }
}
