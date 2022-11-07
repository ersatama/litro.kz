<?php

namespace App\Domain\Services;

abstract class MainService
{
    public function update($model, array $array)
    {
        foreach ($array as $key=>$value) {
            $model->{$key}   =   $value;
        }
        return $model->save();
    }
}
