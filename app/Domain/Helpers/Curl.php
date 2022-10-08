<?php

namespace App\Domain\Helpers;

class Curl
{
    public function get(string $url): bool|string|array|int|null
    {
        $curl   =   curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $exec   =   curl_exec($curl);
        curl_close($curl);
        return $exec;
    }
}
