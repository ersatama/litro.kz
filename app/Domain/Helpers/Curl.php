<?php

namespace App\Domain\Helpers;

use Illuminate\Support\Facades\Log;

class Curl
{
    public function get(string $url): bool|string
    {
        $curl   =   curl_init();
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        $exec   =   curl_exec($curl);
        curl_close($curl);
        return $exec;
    }

    public function post(string $url, array $header, array $fields): bool|string
    {
        $curl   =   curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

}
