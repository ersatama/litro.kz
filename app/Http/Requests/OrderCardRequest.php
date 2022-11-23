<?php

namespace App\Http\Requests;

use App\Domain\Contracts\Contract;
use Illuminate\Foundation\Http\FormRequest;

class OrderCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Contract::CARD_ID   =>  'required|exists:cards,id',
            Contract::USER_ID   =>  'required|exists:users,id',
            Contract::NUMBER    =>  'required|unique:order_cards,number',
            Contract::PRICE     =>  'required',
            Contract::START_DATE    =>  'required|date',
            Contract::END_DATE      =>  'required|date',
            Contract::ACTIVATE_DATE =>  'required|date',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            Contract::CARD_ID . '.required' =>  'Выберите карту',
            Contract::USER_ID . '.required' =>  'Выберите пользователя',
            Contract::NUMBER  . '.required' =>  'Укажите номер карты',
            Contract::NUMBER  . '.unique'   =>  'Номер карты занят',
            Contract::PRICE   . '.required' =>  'Укажите цену',
            Contract::START_DATE    . '.required' =>  'Укажите начало даты',
            Contract::END_DATE      . '.required' =>  'Укажите конец даты',
            Contract::ACTIVATE_DATE . '.required' =>  'Укажите дату активации',
        ];
    }
}
