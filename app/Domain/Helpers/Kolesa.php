<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;
use DiDom\Document;
use DiDom\Exceptions\InvalidSelectorException;
use Illuminate\Support\Facades\Log;
use function Sentry\captureException;

class Kolesa
{
    protected Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl =   $curl;
    }

    /**
     * @throws InvalidSelectorException
     */
    public function getAveragePrice($brand, $model, $year): int
    {
        $price  =   0;
        $prices =   [];
        try {
            $html   =   new Document($this->url($brand, $model,$year), true);
            $dom    =   $html->find('.a-list__item > .js__a-card');
        } catch (\Exception $exception) {
            captureException($exception);
            return $price;
        }
        foreach ($dom as &$value) {
            $valuePrices    =   $value->find('.a-card__price');
            foreach ($valuePrices as &$valuePrice) {
                $prices[]   =   (int) preg_replace('/[^0-9]/', '', $valuePrice->text());
            }
            try {
                $htmlPrice  =   $this->curl->get(config('kolesa.urlAveragePrice').$value->getAttribute('data-id').'/');
                $htmlPrice  =   json_decode($htmlPrice,true);
                if ($htmlPrice[Contract::TYPE] === Contract::SUCCESS) {
                    $price  =   (int) $htmlPrice[Contract::DATA][Contract::_AVERAGE_PRICE];
                    break;
                }
            } catch (\Exception $exception) {
                captureException($exception);
            }
        }
        return $price > 0 ? $price : $this->average($prices);
    }

    public function average($prices): int
    {
        if (sizeof($prices) > 0) {
            return intval(array_sum($prices)/count($prices));
        }
        return 0;
    }

    public function url($brand, $model, $year): string
    {
        $url    =   config('kolesa.url').self::filter($brand).'/'.self::filter($model).'/?';
        $query  =   http_build_query([
            '_txt_' =>  $model,
            'year[from]'    =>  $year,
            'year[to]'      =>  $year,
        ]);
        return $url.$query;
    }

    public static function filter($text): string
    {
        $text   =   str_replace(' ','-',$text);
        $text   =   str_replace('&','and',$text);
        $text   =   str_replace('ë','e',$text);
        return strtolower($text);
    }
}
