<?php

namespace App\Domain\Repositories\Driver;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Driver;
use Carbon\Carbon;

class DriverRepositoryEloquent implements DriverRepositoryInterface
{
    use RepositoryEloquent;

    protected Driver $model;

    public function __construct(Driver $driver)
    {
        $this->model = $driver;
    }

    public static function count()
    {
        return Driver::count();
    }

    public static function lastMonth()
    {
        return Driver::where(Contract::CREATED_AT, '>', Carbon::today()->subDays(30))->count();
    }
}
