<?php

use App\Domain\Contracts\Contract;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db', function () {
    set_time_limit(0);
    Artisan::call('migrate:fresh');
    function gDate($date) {
        $date   =   explode(' ',$date);
        if (sizeof($date) > 0) {
            if ($date[0] != '0001-01-01' && $date[0] != '') {
                return $date[0];
            }
        }
        return '1970-01-01';
    }
    function does_url_exists($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }
    function conv($time) {
        $datetime   =   explode('+',$time);
        if (sizeof($datetime) > 0 && $datetime[0] !== '') {
            if (str_starts_with($datetime[0], '1970') || str_starts_with($datetime[0], '0001')) {
                return null;
            }
            return $datetime[0];
        }
        return NULL;
    }
    function img_convert($img) {
        $image_id   =   null;
        if (str_starts_with($img,'https')) {
            $info   =   pathinfo($img);
            $img    =   $info['filename'];
        }
        if ($i  =   Image::where(Contract::PNG,$img.'.png')->first()) {
            $image_id   =   $i->id;
        } else {
            $arr_img    =   [
                Contract::USER_ID   =>  1,
                Contract::PNG   =>  $img.'.png',
                Contract::JPG   =>  $img.'.jpg',
                Contract::WEBP  =>  $img.'.webp',
            ];
            if (str_starts_with($img,'https')) {
                $info   =   pathinfo($img);
                $arr_img    =   [
                    Contract::USER_ID   =>  1,
                    Contract::PNG   =>  $info['filename'].'.png',
                    Contract::JPG   =>  $info['filename'].'.jpg',
                    Contract::WEBP  =>  $info['filename'].'.webp',
                ];
            }
            $image  =   Image::create($arr_img);
        }
        return $image_id;
    }
    echo '<pre>';
    echo 'car_brands<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from car_brands');
    foreach ($carBrands as $key=>$value) {
        DB::table('car_brands')->insert([
            Contract::ID  =>  $value->id,
            Contract::TITLE =>  $value->name,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }
    $table  =   'car_models';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table($table)->insert([
            Contract::ID  =>  $value->id,
            Contract::CAR_BRAND_ID  =>  $value->car_brand_id,
            Contract::TITLE =>  $value->name,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'stocks';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from stocks_nodes where stock_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->description;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->description;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->description;
            }
        }
        $image_id   =   img_convert($value->image);
        DB::table($table)->insert([
            Contract::ID    =>  $value->id,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::IS_ACTIVE =>  $value->is_active,
            Contract::CATEGORY  =>  $value->category,
            Contract::IMAGE_ID  =>  $image_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'third_party_apps';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table($table)->insert([
            Contract::NAME  =>  $value->name,
            Contract::KEY   =>  $value->id,
            Contract::PASSWORD  =>  $value->password,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'transactions';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table($table)->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_FROM =>  $value->user_from,
            Contract::USER_TO   =>  $value->user_to,
            Contract::BALANCE   =>  $value->balance,
            Contract::DELTA_BALANCE   =>  $value->delta_balance,
            Contract::COMMENT   =>  $value->{Contract::COMMENT},
            Contract::TYPE   =>  $value->{Contract::TYPE},
            Contract::EMAIL   =>  $value->{Contract::EMAIL},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_categories';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from insurance_categories_nodes where category_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table($table)->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FILTER_NAME    =>  $value->{Contract::FILTER_NAME},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_companies';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from insurance_company_nodes where company_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->description;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->description;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->description;
            }
        }
        $image_id   =   img_convert($value->logo);
        DB::table($table)->insert([
            Contract::ID    =>  $value->id,
            Contract::FILTER_NAME   =>  $value->{Contract::FILTER_NAME},
            Contract::OGPO_LINK   =>  $value->ogpo_link,
            Contract::SITE   =>  $value->{Contract::SITE},
            Contract::BONUS_PERCENT =>  $value->bonus_percent,
            Contract::PROVIDES_REQUIRED_INSURANCE   =>  $value->{Contract::PROVIDES_REQUIRED_INSURANCE},
            Contract::PROVIDES_ADDITIONAL_INSURANCE   =>  $value->{Contract::PROVIDES_ADDITIONAL_INSURANCE},
            Contract::REQUIRED_INSURANCE_BONUS   =>  $value->{Contract::REQUIRED_INSURANCE_BONUS},
            Contract::ADDITIONAL_INSURANCE_BONUS   =>  $value->{Contract::ADDITIONAL_INSURANCE_BONUS},
            Contract::KASKO_LINK   =>  $value->{Contract::KASKO_LINK},
            Contract::API_TOKEN   =>  $value->{Contract::API_TOKEN},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::IMAGE_ID  =>  $image_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_company_products';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from insurance_company_products_nodes where product_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table($table)->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::INSURANCE_CATEGORY_ID =>  $value->category_id,
            Contract::INSURANCE_COMPANY_ID =>  $value->company_id,
            Contract::FILTER_NAME    =>  $value->{Contract::FILTER_NAME},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_company_requests_logs';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('insurance_company_request_logs')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::INSURANCE_COMPANY_ID   =>  $value->company_id,
            Contract::INSURANCE_COMPANY_REQUEST_TYPE   =>  $value->company_request_type,
            Contract::ACTION_TYPE    =>  $value->{Contract::ACTION_TYPE},
            Contract::REQUEST_URL    =>  $value->{Contract::REQUEST_URL},
            Contract::RESPONSE_STATUS    =>  $value->{Contract::RESPONSE_STATUS},
            Contract::RESPONSE_BODY    =>  $value->{Contract::RESPONSE_BODY},
            Contract::REQUEST_BODY    =>  $value->{Contract::REQUEST_BODY},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_photos';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        $image_id   =   img_convert($value->key);
        DB::table('insurance_images')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID =>  $value->{Contract::USER_ID},
            Contract::INSURANCE_COMPANY_ID  =>  $value->company_id,
            Contract::POLICY_ID =>  $value->{Contract::POLICY_ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::TYPE  =>  $value->{Contract::TYPE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_kasko_policies';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('insurance_kasko_policies')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID   =>  $value->user_id,
            Contract::USER_CAR_ID   =>  $value->user_car_id,
            Contract::INSURANCE_COMPANY_ID   =>  $value->company_id,
            Contract::STATUS    =>  $value->status,
            Contract::PRICE    =>  $value->{Contract::PRICE},
            Contract::BONUS    =>  $value->{Contract::BONUS},
            Contract::ERROR_MSG    =>  $value->{Contract::ERROR_MSG},
            Contract::POLICY_ID    =>  $value->company_policy_id,
            Contract::POLICY_BODY    =>  $value->{Contract::POLICY_BODY},
            Contract::PRODUCTS    =>  $value->{Contract::PRODUCTS},
            Contract::INSURANCE_PRICE    =>  $value->{Contract::INSURANCE_PRICE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_link_refer_records';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('insurance_link_refer_records')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID   =>  $value->user_id,
            Contract::INSURANCE_COMPANY_ID   =>  $value->company_id,
            Contract::LINK   =>  $value->{Contract::LINK},
            Contract::BONUS_PERCENT   =>  $value->{Contract::BONUS_PERCENT},
            Contract::TYPE   =>  $value->{Contract::TYPE},
            Contract::SUM   =>  $value->{Contract::SUM},
            Contract::REGION   =>  $value->{Contract::REGION},
            Contract::BONUS_MALUS   =>  $value->{Contract::BONUS_MALUS},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_selects';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from insurance_select_nodes where select_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table($table)->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FILTER_NAME    =>  $value->{Contract::FILTER_NAME},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'insurance_select_options';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from insurance_select_option_nodes where select_option_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table($table)->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FILTER_NAME    =>  $value->{Contract::FILTER_NAME},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyers';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        $image_id   =   img_convert($value->image);
        DB::table('lawyers')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::NAME  =>  $value->{Contract::NAME},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyer_cities';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('lawyer_cities')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::LAWYER_ID  =>  $value->{Contract::LAWYER_ID},
            Contract::CITY_ID  =>  $value->{Contract::CITY_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyer_contacts';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('lawyer_contacts')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::LAWYER_ID  =>  $value->{Contract::LAWYER_ID},
            Contract::PHONE  =>  $value->{Contract::PHONE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyer_contact_accesses';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('lawyer_contact_accesses')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::LAWYER_ID  =>  $value->{Contract::LAWYER_ID},
            Contract::USER_ID  =>  $value->{Contract::USER_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyer_services';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from lawyer_service_nodes where lawyer_service_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table('lawyer_services')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FILTER_NAME    =>  $value->{Contract::FILTER_NAME},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'lawyer_service_pivots';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('lawyer_service_pivots')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::LAWYER_ID  =>  $value->{Contract::LAWYER_ID},
            Contract::LAWYER_SERVICE_ID  =>  $value->{Contract::LAWYER_SERVICE_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_points';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        $image_id   =   img_convert($value->avatar);
        DB::table('s_partner_points')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::TITLE  =>  $value->{Contract::TITLE},
            Contract::LEGAL_TITLE  =>  $value->{Contract::LEGAL_TITLE},
            Contract::DESCRIPTION  =>  $value->{Contract::DESCRIPTION},
            Contract::MANAGER_NAME  =>  $value->{Contract::MANAGER_NAME},
            Contract::ADDRESS   =>  $value->{Contract::ADDRESS},
            Contract::CITY_ID   =>  $value->{Contract::CITY_ID},
            Contract::LAT   =>  $value->{Contract::LAT},
            Contract::LONG   =>  $value->{Contract::LONG},
            Contract::INFO   =>  $value->contact_fio,
            Contract::PHONE   =>  $value->phone_number,
            Contract::EMAIL   =>  $value->{Contract::EMAIL},
            Contract::PASSWORD  =>  $value->{Contract::PASSWORD},
            Contract::BONUS_PERCENT =>  $value->{Contract::BONUS_PERCENT},
            Contract::DISCOUNT  =>  $value->litro_discount,
            Contract::SELL_CARD =>  $value->sells_card,
            Contract::ADS_AND_SELL  =>  $value->ads_and_sells_tezlitro,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_point_categories';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('s_partner_point_categories')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::S_PARTNER_POINT_ID  =>  $value->point_id,
            Contract::S_PARTNER_SERVICE_CATEGORY_ID  =>  $value->category_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_point_requisites';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('s_partner_point_requisites')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::S_PARTNER_POINT_ID  =>  $value->point_id,
            Contract::ADDRESS  =>  $value->legal_address,
            Contract::TITLE  =>  $value->legal_title,
            Contract::BIN    =>  $value->{Contract::BIN},
            Contract::IIK    =>  $value->{Contract::IIK},
            Contract::BIK    =>  $value->{Contract::BIK},
            Contract::BANK    =>  $value->{Contract::BANK},
            Contract::INFO    =>  $value->head_fio,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_point_wallets';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('s_partner_point_wallets')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::S_PARTNER_POINT_ID  =>  $value->point_id,
            Contract::CURRENCY_ID  =>  $value->{Contract::CURRENCY_ID},
            Contract::BALANCE   =>  $value->{Contract::BALANCE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_point_wallet_records';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('s_partner_point_wallet_records')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::S_PARTNER_POINT_WALLET_ID  =>  $value->point_wallet_id,
            Contract::S_PARTNER_RECEIVED_SERVICE_ID  =>  $value->received_id,
            Contract::TYPE   =>  $value->{Contract::TYPE},
            Contract::STATUS   =>  $value->{Contract::STATUS},
            Contract::SUM   =>  $value->{Contract::SUM},
            Contract::PREVIOUS_BALANCE   =>  $value->{Contract::PREVIOUS_BALANCE},
            Contract::PAYMENT_ID   =>  $value->{Contract::PAYMENT_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_received_services';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('s_partner_received_services')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID  =>  $value->user_id,
            Contract::S_PARTNER_POINT_ID   =>  $value->point_id,
            Contract::PRICE   =>  $value->{Contract::PRICE},
            Contract::CURRENCY_ID   =>  $value->{Contract::CURRENCY_ID},
            Contract::IS_PAID   =>  $value->{Contract::IS_PAID},
            Contract::STATUS   =>  $value->{Contract::STATUS},
            Contract::SUM_FROM_WALLET   =>  $value->{Contract::SUM_FROM_WALLET},
            Contract::SUM_FROM_BANK_CARD   =>  $value->{Contract::SUM_FROM_BANK_CARD},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   's_partner_service_categories';
    echo $table.'<br>';
    $datas  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($datas as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from s_partner_service_categories_nodes where category_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        DB::table('s_partner_service_categories')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::NAME =>  $title,
            Contract::NAME_KZ =>  $title_kz,
            Contract::NAME_EN =>  $value->name,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'users';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('users')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::EMAIL    =>  ($value->{Contract::EMAIL}!=''?$value->{Contract::EMAIL}:null),
            Contract::PHONE    =>  $value->{Contract::PHONE},
            Contract::FIRST_NAME    =>  $value->firstname,
            Contract::LAST_NAME    =>  $value->lastname,
            Contract::PATRONYMIC    =>  $value->patronomyc,
            Contract::BIRTHDATE     =>  gDate($value->birthdate),
            Contract::PASSWORD      =>  $value->{Contract::PASSWORD},
            Contract::IS_BLOCKED    =>  $value->isblocked,
            Contract::GENDER    =>  $value->{Contract::GENDER},
            Contract::CITY_ID   =>  $value->{Contract::CITY_ID},
            Contract::ROLE_ID   =>  $value->{Contract::ROLE_ID},
            Contract::BITRIX_ID =>  $value->{Contract::BITRIX_ID},
            Contract::IS_VLIFE_USER =>  $value->{Contract::IS_VLIFE_USER},
            Contract::VLIFE_USER_ID =>  $value->{Contract::VLIFE_USER_ID},
            Contract::PROMO_CODE    =>  $value->promocode,
            Contract::IIN   =>  $value->{Contract::IIN},
            Contract::BONUS =>  $value->{Contract::BONUS},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }
    $table  =   'wallets';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('wallets')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID    =>  $value->{Contract::USER_ID},
            Contract::CURRENCY_ID    =>  $value->{Contract::CURRENCY_ID},
            Contract::BALANCE    =>  $value->balance,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }


    $table  =   'wallet_records';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        DB::table('wallet_records')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::PAYMENT_ID    =>  $value->{Contract::PAYMENT_ID},
            Contract::WALLET_ID    =>  $value->{Contract::WALLET_ID},
            Contract::CURRENCY_ID    =>  $value->{Contract::CURRENCY_ID},
            Contract::AMOUNT    =>  $value->{Contract::AMOUNT},
            Contract::PREVIOUS_BALANCE    =>  $value->{Contract::PREVIOUS_BALANCE},
            Contract::TYPE    =>  $value->{Contract::TYPE},
            Contract::STATUS    =>  $value->{Contract::STATUS},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'auto_parts_categories';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {

        $data   =   DB::connection('pgsql')->select('select * from auto_parts_categories_nodes where category_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->singular_name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->singular_name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->singular_name;
            }
        }

        DB::table('auto_part_categories')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::POSITION     =>  $value->{Contract::POSITION},
            Contract::PARENT_ID    =>  $value->parent_category_id,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'auto_parts_params';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {

        $data   =   DB::connection('pgsql')->select('select * from auto_parts_params_nodes where param_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }

        DB::table('auto_part_params')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::AUTO_PART_CATEGORY_ID =>  $value->category_id,
            Contract::AUTO_PART_TYPE_ID =>  $value->type==='string'?1:2,
            Contract::FILTER    =>  $value->filter_name,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }

    $table  =   'auto_parts_params_options';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {

        $data   =   DB::connection('pgsql')->select('select * from auto_parts_params_options_nodes where option_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }

        DB::table('auto_part_param_options')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::AUTO_PART_PARAM_ID =>  $value->param_id,
            Contract::FILTER    =>  $value->filter_name,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ]);
    }
    $table  =   'cars';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' order by id');
    foreach ($carBrands as &$value) {
        DB::table('cars')->insert([
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CAR_MODEL_ID  =>  $value->{Contract::CAR_MODEL_ID},
            Contract::YEAR  =>  substr($value->{Contract::YEAR}, 0, 3),
            Contract::CAR_NUMBER    =>  $value->auto_number,
            Contract::ORDER_CARD_ID =>  $value->{Contract::ORDER_CARD_ID},
            Contract::VIN    =>  $value->vin,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  ($value->deleted_at?now():null)
        ]);
    }
    $table  =   'car_categories';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from car_category_nodes where car_category_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        $img   =   DB::connection('pgsql')->select('select * from images where id='.$value->image_id);
        $info   =   pathinfo($img[0]->path);
        $image_id   =   img_convert($img[0]->path);
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('car_categories')->insert($data_info);
    }
    $table  =   'cards';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from card_nodes where card_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        $detail =   '';
        $detail_kz  =   '';
        $detail_en  =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->description;
                $detail =   $item->service_description;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->description;
                $detail_en =   $item->service_description;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->description;
                $detail_kz =   $item->service_description;
            }
        }
        $img    =   DB::connection('pgsql')->select('select * from images where id='.$value->image_id);
        $info   =   pathinfo($img[0]->path);
        $image_id   =   img_convert($info['filename']);

        $settings   =   json_decode($value->settings);

        $icon   =   null;
        $image  =   null;
        $icon_selected  =   null;
        $colors =   null;
        if ($settings) {
            $stat   =   false;
            if (isset($settings->icon) && $settings->icon !== '') {
                $icon   =   img_convert($settings->icon);
                $stat   =   true;
            }
            if (isset($settings->image) && $settings->image !== '') {
                $image  =   img_convert($settings->image);
                $stat   =   true;
            }
            if (isset($settings->icon_selected) && $settings->icon_selected !== '') {
                $icon_selected  =   img_convert($settings->icon_selected);
                $stat   =   true;
            }
            if (isset($settings->colors) && $settings->colors !== '') {
                $colors =   json_encode($settings->colors);
            }
        }

        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::COLORS    =>  $colors,
            Contract::IMAGE_ID  =>  $image_id,
            Contract::IMG   =>  $image,
            Contract::ICON  =>  $icon,
            Contract::ICON_SELECTED =>  $icon_selected,
            Contract::CARD_CATEGORY_ID  =>  $value->category_card_id,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::DETAIL =>  $detail,
            Contract::DETAIL_KZ => $detail_kz,
            Contract::DETAIL_EN =>  $detail_en,
            Contract::PRICE =>  $value->price,
            Contract::RANK  =>  $value->rank,
            Contract::ALLOWED_DRIVERS   =>  $value->allowed_drivers,
            Contract::ALLOWED_CARS  =>  $value->allowed_cars,
            Contract::IS_ACTIVE =>  $value->is_active,
            Contract::CLIENT_DISCOUNT   =>  $value->clients_discount,
            Contract::PRICE_MONTHLY   =>  $value->price_monthly,
            Contract::PRICE_MONTHLY_FIRST_MONTH =>  $value->price_monthly_first_month,
            Contract::REFERRAL_PRICE_MONTHLY    =>  $value->referal_price_monthly,
            Contract::REFERRAL_PRICE_MONTHLY_FIRST_MONTH    =>  $value->referal_price_monthly_first_month,
            Contract::IS_FOR_CORPORATE_USE  =>  $value->is_for_corporate_use,

            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('cards')->insert($data_info);
    }

    $table  =   'global_categories';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from global_category_nodes where global_category_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->title;
                $description    =   $item->description;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->title;
                $description_en    =   $item->description;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->title;
                $description_kz    =   $item->description;
            }
        }
        $image_id   =   img_convert($value->image);
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::IMAGE_ID  =>  $image_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('card_categories')->insert($data_info);
    }

    $table  =   'card_ranges';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CITY_ID    =>  $value->{Contract::CITY_ID},
            Contract::CARD_ID    =>  $value->{Contract::CARD_ID},
            Contract::CURRENT_SYNCED    =>  $value->{Contract::CURRENT_SYNCED},
            Contract::LEGAL_PERSON    =>  $value->{Contract::LEGAL_PERSON},
            Contract::STATUS    =>  $value->{Contract::STATUS},
            Contract::C_FROM    =>  $value->cfrom,
            Contract::C_TO    =>  $value->cto,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  now(),
            Contract::DELETED_AT    =>  now()
        ];
        DB::table('card_ranges')->insert($data_info);
    }

    $table  =   'card_services';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from card_service_nodes where card_service_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CARD_ID    =>  $value->{Contract::CARD_ID},
            Contract::SERVICE_ID    =>  $value->{Contract::SERVICE_ID},
            Contract::VALUE    =>  $value->{Contract::VALUE},
            Contract::POSITION  =>  $value->{Contract::POSITION},
            Contract::IS_CHOOSEABLE =>  $value->{Contract::IS_CHOOSEABLE},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('card_services')->insert($data_info);
    }

    $table  =   'cities';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from city_nodes where city_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::REGION_ID    =>  $value->{Contract::REGION_ID},
            Contract::IS_ACTIVE    =>  $value->{Contract::IS_ACTIVE},
            Contract::LAT    =>  $value->{Contract::LAT},
            Contract::LONG    =>  $value->{Contract::LONG},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('cities')->insert($data_info);
    }

    $table  =   'city_services';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CITY_ID    =>  $value->{Contract::CITY_ID},
            Contract::SERVICE_ID    =>  $value->{Contract::SERVICE_ID},
            Contract::PRICE    =>  $value->{Contract::PRICE},
            Contract::IS_FREE    =>  $value->{Contract::IS_FREE},
            Contract::IS_WITH_CHECK    =>  $value->{Contract::IS_WITH_CHECK},
            Contract::IS_NEGOTIABLE_PRICE    =>  $value->{Contract::IS_NEGOTIABLE_PRICE},
        ];
        DB::table('city_services')->insert($data_info);
    }

    $table  =   'codes';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::PHONE    =>  $value->{Contract::PHONE},
            Contract::EMAIL    =>  $value->{Contract::EMAIL},
            Contract::CODE    =>  $value->{Contract::CODE},
            Contract::STATUS    =>  $value->{Contract::STATUS},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('codes')->insert($data_info);
    }

    $table  =   'countries';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::TITLE  =>  $value->name,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('countries')->insert($data_info);
    }

    $table  =   'currencies';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::ISO_TITLE  =>  $value->iso_title,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('currencies')->insert($data_info);
    }

    $table  =   'drivers';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FIRST_NAME  =>  $value->{Contract::FIRST_NAME},
            Contract::LAST_NAME  =>  $value->{Contract::LAST_NAME},
            Contract::PATRONYMIC  =>  $value->patronomyc,
            Contract::REFERRAL_CODE  =>  $value->{Contract::REFERRAL_CODE},
            Contract::ORDER_CARD_ID  =>  $value->{Contract::ORDER_CARD_ID},
            Contract::PHONE  =>  $value->{Contract::PHONE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('drivers')->insert($data_info);
    }

    $table  =   'eco_services';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from eco_services_nodes where eco_service_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->slogan;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->slogan;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->slogan;
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::POSITION    =>  $value->{Contract::POSITION},
            Contract::STATUS    =>  $value->{Contract::STATUS},
            Contract::TYPE    =>  $value->{Contract::TYPE},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('eco_services')->insert($data_info);
    }

    $table  =   'gifts';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID    =>  $value->{Contract::USER_ID},
            Contract::NUMBER    =>  $value->{Contract::NUMBER},
            Contract::IS_PAID    =>  $value->is_payed,
            Contract::PAYBOX_ORDER_ID    =>  $value->{Contract::PAYBOX_ORDER_ID},
            Contract::PAYBOX_ORDER_DATE    =>  $value->{Contract::PAYBOX_ORDER_DATE},
            Contract::ACTIVATED_BY    =>  $value->{Contract::ACTIVATED_BY},
            Contract::CARD_ID    =>  $value->{Contract::CARD_ID},
            Contract::PRICE    =>  $value->{Contract::PRICE},
            Contract::PROMO_CODE    =>  $value->{Contract::PROMO_CODE},
            Contract::PHONE    =>  $value->{Contract::PHONE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('gifts')->insert($data_info);
    }

    $table  =   'user_cars';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID   =>  $value->{Contract::USER_ID},
            Contract::CAR_BRAND_ID    =>  $value->brand_id,
            Contract::CAR_MODEL_ID    =>  $value->model_id,
            Contract::YEAR    =>  $value->year,
            Contract::REGISTRATION_CERTIFICATE    =>  $value->tex_passport,
            Contract::CAR_NUMBER    =>  $value->auto_number,
            Contract::VIN    =>  $value->{Contract::VIN},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('user_cars')->insert($data_info);
    }

    $table  =   'transactions_to_non_existing_users';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::SUM   =>  $value->{Contract::SUM},
            Contract::EMAIL   =>  $value->{Contract::EMAIL},
            Contract::PHONE   =>  $value->{Contract::PHONE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('transaction_to_non_existing_users')->insert($data_info);
    }

    $table  =   'money_operations';
    echo $table.'<br>';
    $carBrands  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($carBrands as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::MONEY_OPERATION_TYPE_ID   =>  $value->operation_type_id,
            Contract::USER_ID   =>  $value->user_id,
            Contract::WALLET_RECORD_ID   =>  $value->wallet_record_id,
            Contract::PAYMENT_ID   =>  $value->payment_id,
            Contract::STATUS   =>  $value->status,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('money_operations')->insert($data_info);
    }

    $table  =   'money_operation_types';
    echo $table.'<br>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($values as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from money_operation_types_nodes where money_operation_type_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->title;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->title;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->title;
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FILTER    =>  $value->name,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('money_operation_types')->insert($data_info);
    }

    $table  =   'news';
    echo $table.'<br>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($values as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from news_nodes where news_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->text;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->text;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->text;
            }
        }
        $img   =   DB::connection('pgsql')->select('select * from images where id='.$value->image_id);
        $info   =   pathinfo($img[0]->path);
        $image_id   =   img_convert($info['filename']);

        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::IS_ACTIVE    =>  $value->is_active,
            Contract::NEWS_CATEGORY_ID  =>  $value->category_news_id,
            Contract::LINK  =>  $value->link,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('news')->insert($data_info);
    }

    $table  =   'category_news';
    echo $table.'<br>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($values as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from category_news_nodes where category_news_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }

        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('news_categories')->insert($data_info);
    }

    $table  =   'order_cards';
    echo $table.'<br>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($values as &$value) {

        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CARD_ID =>  $value->{Contract::CARD_ID},
            Contract::USER_ID =>  $value->{Contract::USER_ID},
            Contract::PRICE =>  $value->{Contract::PRICE},
            Contract::NUMBER =>  $value->{Contract::NUMBER},
            Contract::START_DATE =>  conv($value->{Contract::START_DATE}),
            Contract::END_DATE =>  conv($value->{Contract::END_DATE}),
            Contract::PAYMENT_TYPE =>  $value->{Contract::PAYMENT_TYPE},
            Contract::IS_PAID =>  $value->is_payed,
            Contract::IS_CANCELED =>  $value->is_cancelled,
            Contract::PAYBOX_ORDER_ID =>  $value->{Contract::PAYBOX_ORDER_ID},
            Contract::PAYBOX_ORDER_DATE =>  $value->{Contract::PAYBOX_ORDER_DATE},
            Contract::STATUS =>  $value->{Contract::STATUS},
            Contract::REFERRAL =>  $value->referal,
            Contract::BITRIX_ID =>  $value->{Contract::BITRIX_ID},
            Contract::SYNCED =>  $value->{Contract::SYNCED},
            Contract::MONTHLY =>  $value->{Contract::MONTHLY},
            Contract::RECURRENT_ENABLED =>  $value->{Contract::RECURRENT_ENABLED},
            Contract::ACTIVATE_DATE =>  conv($value->{Contract::ACTIVATE_DATE}),
            Contract::PAYMENT_METHOD =>  $value->{Contract::PAYMENT_METHOD},
            Contract::UTM_CAMPAIGN =>  $value->{Contract::UTM_CAMPAIGN},
            Contract::IS_FROM_EXCEL =>  $value->{Contract::IS_FROM_EXCEL},
            Contract::IMPORT_ID =>  $value->{Contract::IMPORT_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('order_cards')->insert($data_info);
    }

    $table  =   'order_services';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table.' ORDER BY id');
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::PRICE =>  $value->total_price,
            Contract::PAYMENT_TYPE =>  $value->{Contract::PAYMENT_TYPE},
            Contract::ADDRESS =>  $value->{Contract::ADDRESS},
            Contract::LAT =>  $value->address_coor_lat,
            Contract::LONG =>  $value->address_coor_lon,
            Contract::IS_PAID =>  $value->is_payed,
            Contract::IS_CANCELED =>  $value->is_cancelled,
            Contract::USER_ID =>  $value->{Contract::USER_ID},
            Contract::STATUS =>  $value->{Contract::STATUS},
            Contract::BITRIX_ID =>  $value->{Contract::BITRIX_ID},
            Contract::PLACE_ID =>  $value->{Contract::PLACE_ID},
            Contract::REVIEW =>  $value->{Contract::REVIEW},
            Contract::RANK =>  $value->{Contract::RANK},
            Contract::NAME =>  $value->{Contract::NAME},
            Contract::PHONE =>  $value->{Contract::PHONE},
            Contract::CITY_ID =>  $value->{Contract::CITY_ID},
            Contract::IS_CARD =>  $value->{Contract::IS_CARD},
            Contract::CAR_CATEGORY_ID =>  $value->{Contract::CAR_CATEGORY_ID},
            Contract::MASTER_ID =>  $value->{Contract::MASTER_ID},
            Contract::UTM_CAMPAIGN =>  $value->{Contract::UTM_CAMPAIGN},
            Contract::PAYBOX_ORDER_ID =>  $value->{Contract::PAYBOX_ORDER_ID},
            Contract::PAYBOX_ORDER_DATE =>  $value->{Contract::PAYBOX_ORDER_DATE},
            Contract::OLD_PRICE =>  $value->{Contract::OLD_PRICE},
            Contract::PAYMENT_METHOD =>  $value->{Contract::PAYMENT_METHOD},
            Contract::ORDER_CARD_ID =>  $value->{Contract::ORDER_CARD_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('order_services')->insert($data_info);
    }

    $table  =   'order_services_services';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ORDER_SERVICE_ID  =>  $value->{Contract::ORDER_SERVICE_ID},
            Contract::SERVICE_ID    =>  $value->{Contract::SERVICE_ID},
            Contract::PRICE =>  $value->{Contract::PRICE}
        ];
        \App\Models\OrderServiceService::create($data_info);
    }

    $table  =   'partners';
    echo $table.'<br>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $image_id   =   null;
        if ($value->image) {
            $info   =   pathinfo($value->image);
            $image_id   =   img_convert($info['filename']);
        }

        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::IMAGE_ID  =>  $image_id,
            Contract::NAME  =>  $value->{Contract::NAME},
            Contract::POSITION =>  $value->{Contract::POSITION},
            Contract::LINK =>  $value->{Contract::LINK},
            Contract::TOKEN =>  $value->{Contract::TOKEN},
            Contract::IS_ACTIVE =>  $value->visible,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('partners')->insert($data_info);
    }

    $table  =   'partner_cards';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CARD_ID   =>  $value->{Contract::CARD_ID},
            Contract::PARTNER_ID    =>  $value->{Contract::PARTNER_ID},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('partner_cards')->insert($data_info);
    }

    $table  =   'partner_purchases';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $date   =   explode('T',$value->{Contract::PURCHASE_DATE});
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::PURCHASE_ID   =>  $value->{Contract::PURCHASE_ID},
            Contract::PURCHASE_DATE   =>  $date[0],
            Contract::PARTNER_ID    =>  $value->{Contract::PARTNER_ID},
            Contract::PHONE =>  $value->{Contract::PHONE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];
        DB::table('partner_purchases')->insert($data_info);
    }

    $table  =   'payments';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::USER_ID   =>  $value->{Contract::USER_ID},
            Contract::SUM   =>  $value->{Contract::SUM},
            Contract::CURRENCY_ID    =>  $value->{Contract::CURRENCY_ID},
            Contract::STATUS =>  $value->{Contract::STATUS},
            Contract::PAYMENT_TYPE =>  $value->p_type,
            Contract::PAYMENT_SYSTEM_ID =>  $value->pay_sys_id,
            Contract::PAYMENT_SYSTEM_INFO =>  $value->pay_sys_info,
            Contract::PAYMENT_ID =>  $value->pay_sys_payment_id,
            Contract::PAYMENT_KEY =>  $value->{Contract::PAYMENT_KEY},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('payments')->insert($data_info);
    }

    $table  =   'payment_systems';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::TITLE =>  $value->{Contract::NAME},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('payment_systems')->insert($data_info);
    }

    $table  =   'places';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::SERVICE_ID =>  $value->{Contract::SERVICE_ID},
            Contract::CITY_ID =>  $value->{Contract::CITY_ID},
            Contract::LAT =>  $value->{Contract::LAT},
            Contract::LONG =>  $value->{Contract::LONG},
            Contract::ADDRESS =>  $value->{Contract::ADDRESS},
            Contract::TITLE =>  $value->{Contract::TITLE},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('places')->insert($data_info);
    }

    $table  =   'recurrents';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::AMOUNT =>  $value->{Contract::AMOUNT},
            Contract::PAYMENT_DATE =>  conv($value->{Contract::PAYMENT_DATE}),
            Contract::CARD_PAN =>  $value->{Contract::CARD_PAN},
            Contract::ORDER_ID =>  $value->{Contract::ORDER_ID},
            Contract::RECURRING_PROFILE_ID =>  $value->{Contract::RECURRING_PROFILE_ID},
            Contract::NEXT_PAYMENT =>  conv($value->{Contract::NEXT_PAYMENT}),
            Contract::RESULT =>  $value->{Contract::RESULT},
            Contract::SALT =>  $value->{Contract::SALT},
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('recurrents')->insert($data_info);
    }

    $table  =   'services';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from service_nodes where service_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        $view  =   '';
        $view_kz   =   '';
        $view_en   =   '';
        $tagline  =   '';
        $tagline_kz   =   '';
        $tagline_en   =   '';
        $description    =   '';
        $description_kz =   '';
        $description_en =   '';
        $annotation    =   '';
        $annotation_kz =   '';
        $annotation_en =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
                $description    =   $item->description;
                $view    =   $item->view_title;
                $tagline    =   $item->slogan;
                $annotation =   $item->annotation;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
                $description_en    =   $item->description;
                $view_en    =   $item->view_title;
                $tagline_en    =   $item->slogan;
                $annotation_en =   $item->annotation;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
                $description_kz    =   $item->description;
                $view_kz    =   $item->view_title;
                $tagline_kz    =   $item->slogan;
                $annotation_kz =   $item->annotation;
            }
        }
        $image_id   =   null;
        if ($value->image_id) {
            $img   =   DB::connection('pgsql')->select('select * from images where id='.$value->image_id);
            $info   =   pathinfo($img[0]->path);
            $image_id   =   img_convert($info['filename']);
        }
        $browser_image_id   =   null;
        if ($value->browser_image_id) {
            $img   =   DB::connection('pgsql')->select('select * from images where id='.$value->browser_image_id);
            $info   =   pathinfo($img[0]->path);
            $browser_image_id   =   img_convert($info['filename']);
        }
        $additional_image_id    =   null;
        if ($value->additional_image_id) {
            $img   =   DB::connection('pgsql')->select('select * from images where id='.$value->additional_image_id);
            if (does_url_exists($img[0]->path)) {
                $info   =   pathinfo($img[0]->path);
                file_put_contents($info['basename'],file_get_contents($img[0]->path));
                $additional_image_id   =   img_convert($info['filename']);
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::SERVICE_TYPE_ID    =>  $value->type_id,
            Contract::POSITION  =>  $value->{Contract::POSITION},
            Contract::IS_ACTIVE =>  $value->isactive,
            Contract::URL   =>  $value->url,
            Contract::PRICE =>  $value->price,
            Contract::CARD_PRICE    =>  $value->price_card,
            Contract::SELECTABLE    =>  $value->selectable,
            Contract::WITHOUT_CARD  =>  $value->can_order_without_card,
            Contract::WITH_CARD =>  $value->can_order_with_card,
            Contract::NOTE_STARS    =>  $value->note_stars,
            Contract::IS_CORPORATE  =>  $value->is_corporate,
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::VIEW =>  $view,
            Contract::VIEW_KZ =>  $view_kz,
            Contract::VIEW_EN =>  $view_en,
            Contract::TAGLINE =>  $tagline,
            Contract::TAGLINE_KZ =>  $tagline_kz,
            Contract::TAGLINE_EN =>  $tagline_en,
            Contract::ANNOTATION =>  $annotation,
            Contract::ANNOTATION_KZ =>  $annotation_kz,
            Contract::ANNOTATION_EN =>  $annotation_en,
            Contract::DESCRIPTION =>  $description,
            Contract::DESCRIPTION_KZ => $description_kz,
            Contract::DESCRIPTION_EN =>  $description_en,
            Contract::IMAGE_ID  =>  $image_id,
            Contract::BROWSER_IMAGE_ID  =>  $browser_image_id,
            Contract::ADDITIONAL_IMAGE_ID   =>  $additional_image_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('services')->insert($data_info);
    }

    $table  =   'service_types';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data   =   DB::connection('pgsql')->select('select * from service_type_nodes where service_type_id='.$value->id);
        $title  =   '';
        $title_kz   =   '';
        $title_en   =   '';
        foreach ($data as &$item) {
            if ($item->lang === 'ru') {
                $title  =   $item->name;
            } elseif ($item->lang === 'en') {
                $title_en  =   $item->name;
            } elseif ($item->lang === 'kz') {
                $title_kz  =   $item->name;
            }
        }
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CARD_CATEGORY_ID  =>  $value->global_category_id,
            Contract::POSITION  =>  $value->{Contract::POSITION},
            Contract::TITLE =>  $title,
            Contract::TITLE_KZ =>  $title_kz,
            Contract::TITLE_EN =>  $title_en,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('service_types')->insert($data_info);
    }

    $table  =   'service_limits';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::SERVICE_ID  =>  $value->service_id,
            Contract::CARD_ID  =>  $value->card_id,
            Contract::LIMIT =>  $value->limit,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('service_limits')->insert($data_info);
    }

    $table  =   'service_prices';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::CITY_ID  =>  $value->city_id,
            Contract::SERVICE_ID  =>  $value->service_id,
            Contract::CAR_CATEGORY_ID   =>  $value->car_category_id,
            Contract::PRICE =>  $value->price,
            Contract::IS_FREE =>  $value->is_free,
            Contract::IS_WITH_CHECK =>  $value->is_with_check,
            Contract::IS_NEGOTIABLE_PRICE =>  $value->{Contract::IS_NEGOTIABLE_PRICE},
        ];

        DB::table('service_prices')->insert($data_info);
    }

    $table  =   'regions';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::COUNTRY_ID  =>  $value->country_id,
            Contract::TITLE =>  $value->name,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('regions')->insert($data_info);
    }

    $table  =   'old_order_cards';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::ORDER_CARD_ID  =>  $value->new_order_card_id,
            Contract::ORDER_CARD_ID_OLD =>  $value->old_order_card_id,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('order_card_olds')->insert($data_info);
    }

    $table  =   'messages';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FULLNAME  =>  $value->fullname,
            Contract::EMAIL =>  $value->email,
            Contract::PHONE =>  $value->phone,
            Contract::TEXT =>  $value->text,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('messages')->insert($data_info);
    }

    exit;
    return view('welcome');
});

Route::get('/add', function() {
    set_time_limit(0);
    function gDate($date) {
        $date   =   explode(' ',$date);
        if (sizeof($date) > 0) {
            if ($date[0] != '0001-01-01' && $date[0] != '') {
                return $date[0];
            }
        }
        return '1970-01-01';
    }
    function conv($time) {
        $datetime   =   explode('+',$time);
        if (sizeof($datetime) > 0 && $datetime[0] !== '') {
            if (str_starts_with($datetime[0], '1970') || str_starts_with($datetime[0], '0001')) {
                return null;
            }
            return $datetime[0];
        }
        return NULL;
    }
    function img_convert($img) {
        $image_id   =   null;
        if (str_starts_with($img,'https')) {
            $info   =   pathinfo($img);
            $img    =   $info['filename'];
        }
        if ($i  =   Image::where(Contract::PNG,$img.'.png')->first()) {
            $image_id   =   $i->id;
        } else {
            $arr_img    =   [
                Contract::USER_ID   =>  1,
                Contract::PNG   =>  $img.'.png',
                Contract::JPG   =>  $img.'.jpg',
                Contract::WEBP  =>  $img.'.webp',
            ];
            if (str_starts_with($img,'https')) {
                $info   =   pathinfo($img);
                $arr_img    =   [
                    Contract::USER_ID   =>  1,
                    Contract::PNG   =>  $info['filename'].'.png',
                    Contract::JPG   =>  $info['filename'].'.jpg',
                    Contract::WEBP  =>  $info['filename'].'.webp',
                ];
            }
            $image  =   Image::create($arr_img);
            $image_id   =   $image->id;
            echo $image_id.'<br>';
        }
        return $image_id;
    }

    function does_url_exists($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

    $table  =   'messages';
    echo $table.'<br><pre>';
    $values  =   DB::connection('pgsql')->select('select * from '.$table);
    foreach ($values as &$value) {
        $data_info  =   [
            Contract::ID    =>  $value->{Contract::ID},
            Contract::FULLNAME  =>  $value->fullname,
            Contract::EMAIL =>  $value->email,
            Contract::PHONE =>  $value->phone,
            Contract::TEXT =>  $value->text,
            Contract::CREATED_AT    =>  conv($value->created_at),
            Contract::UPDATED_AT    =>  conv($value->updated_at),
            Contract::DELETED_AT    =>  conv($value->deleted_at)
        ];

        DB::table('messages')->insert($data_info);
    }
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
