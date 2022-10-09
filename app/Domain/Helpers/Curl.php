<?php

namespace App\Domain\Helpers;

class Curl
{
    public function get(string $url)
    {
        $curl   =   curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        $exec   =   curl_exec($curl);
        curl_close($curl);
        return $exec;
    }

}
