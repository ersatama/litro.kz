<?php

namespace App\Observers;

use App\Domain\Contracts\Contract;
use App\Domain\Helpers\Sms;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @param Sms $sms
     * @return void
     */
    public function created(User $user, Sms $sms): void
    {
        $message    =   'Поздравляем! Вы зарегистрированы в приложении технической помощи LiTRO. Для входа используйте Ваш номер телефона,пароль: 12345678 Круглосуточный колл центр 5070';
        $sms->send($user->{Contract::PHONE},$message);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
