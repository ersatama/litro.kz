<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;
use App\Models\User;

class OneSignal
{
    const AUTH_KEY  =   'YzRmMzA4ZjItYTFhYi00ZjIyLTk4ZWQtNDg5MjZiNmJlYjY1';
    const APP_ID    =   '84cd05f0-7fdf-4980-8e3e-074017a199d0';
    const SOUND     =   'push_sound.mp3';
    const URL   =   'https://onesignal.com/api/v1/notifications';

    protected Curl $curl;
    public function __construct(Curl $curl)
    {
        $this->curl =   $curl;
    }

    public function getFields($fields): array
    {
        $data   =   [[
            Contract::KEY   =>  Contract::STATUS,
            Contract::VALUE =>  1,
            Contract::RELATION  =>  '=',
        ]];

        if (array_key_exists(Contract::USER,$fields)) {
            $data[] =   [
                Contract::KEY   =>  Contract::USER_ID,
                Contract::VALUE =>  $fields[Contract::USER]->{Contract::ID},
                Contract::RELATION  =>  '=',
            ];
        }

        foreach ($fields[Contract::PARAMETERS] as $key => $value) {
            $data[] =   [
                Contract::KEY   =>  $key,
                Contract::VALUE =>  $value,
                Contract::RELATION  =>  '=',
            ];
        }

        if (array_key_exists(Contract::TYPE, $fields) && $fields[Contract::TYPE] !== 'default') {
            $fields[Contract::ADDITIONAL][Contract::TYPE]   =   $fields[Contract::TYPE];
        }

        if (array_key_exists(Contract::TYPE_ID, $fields) && $fields[Contract::TYPE_ID] !== 0) {
            $fields[Contract::ADDITIONAL][Contract::TYPE_ID]    =   $fields[Contract::TYPE_ID];
        }

        $params =   [
            Contract::APP_ID    =>  self::APP_ID,
            Contract::DATA  =>  $fields[Contract::ADDITIONAL],
            Contract::TAGS  =>  $data,
            Contract::IS_ANDROID    =>  true,
            Contract::IS_IOS        =>  true,
            Contract::IS_ANY_WEB    =>  false,
            Contract::ANDROID_SOUND =>  self::SOUND,
            Contract::IOS_SOUND     =>  self::SOUND,
            Contract::CONTENTS  =>  [
                Contract::EN    =>  $fields[Contract::TEXT],
                Contract::RU    =>  $fields[Contract::TEXT]
            ]
        ];

        if (array_key_exists(Contract::TITLE, $fields)) {
            $params[Contract::HEADINGS] =   [
                Contract::EN    =>  $fields[Contract::TITLE],
                Contract::RU    =>  $fields[Contract::TITLE],
            ];
        }

        if (array_key_exists(Contract::SOUND, $fields) && $fields[Contract::SOUND] !== '') {
            $params[Contract::IOS_BADGE_TYPE]   =   Contract::INCREASE;
            $params[Contract::IOS_BADGE_COUNT]  =   1;
        }

        if (array_key_exists(Contract::IMAGE, $fields) && $fields[Contract::IMAGE] !== '') {
            $params[Contract::BIG_PICTURE]  =   $fields[Contract::IMAGE];
            $params[Contract::IOS_ATTACHMENTS]  =   [
                Contract::ID    =>  $fields[Contract::IMAGE]
            ];
        }

        return $params;
    }

    public function send(User $user, string $text = '', array $parameters = [], string $type = 'default', int $typeId = 0, string $sound = '', array &$additional = [], string $image = ''): bool|string
    {
        return $this->sendCurl($this->getFields([
            Contract::PARAMETERS    =>  $parameters,
            Contract::ADDITIONAL    =>  $additional,
            Contract::TYPE_ID   =>  $typeId,
            Contract::TYPE  =>  $type,
            Contract::USER  =>  $user,
            Contract::TEXT  =>  $text,
            Contract::IMAGE =>  $image
        ]));
    }

    public function sendToAll($text, array $parameters = [], string $type = 'default', string $sound = '', array &$additional = [], string $title = '', string $image = ''): bool|string
    {
        return $this->sendCurl($this->getFields([
            Contract::PARAMETERS    =>  $parameters,
            Contract::ADDITIONAL    =>  $additional,
            Contract::TEXT  =>  $text,
            Contract::TITLE =>  $title,
            Contract::TYPE  =>  $type,
            Contract::IMAGE =>  $image
        ]));
    }

    public function sendCurl(array $fields): bool|string
    {
        return $this->curl->post(self::URL, [
            'Content-Type: application/json',
            'Authorization: Basic '.self::AUTH_KEY
        ], $fields);
    }
}
