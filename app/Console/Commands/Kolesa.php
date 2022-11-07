<?php

namespace App\Console\Commands;

use App\Domain\Services\CarModelService;
use App\Jobs\CarModelAveragePrice;
use Illuminate\Console\Command;

class Kolesa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kolesa:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get average price from kolesa.kz';

    /**
     * Execute the console command.
     *
     * @param CarModelService $carModelService
     * @return void
     */
    public function handle(CarModelService $carModelService): void
    {
        $carModels  =   $carModelService->carModelRepository->all();
        foreach ($carModels as &$carModel) {
            $start  =   config('kolesa.start_year');
            $year   =   date('Y');
            for ($i = $start; $i <= $year; $i++) {
                CarModelAveragePrice::dispatch($carModel,$i);
                sleep(1);
            }
        }
        $this->info('Successfully updated CarModelAveragePrice');
    }
}
