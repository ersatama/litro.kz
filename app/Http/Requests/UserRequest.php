<?php

namespace App\Http\Requests;

use App\Domain\Contracts\Contract;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    public function rules(): array
    {
        return [
            Contract::ROLE_ID   =>  'required|exists:roles,id',
            Contract::CITY_ID   =>  'required|exists:cities,id',
            Contract::PHONE =>  'required|unique:users,phone,'.$this->request->get('id'),
            Contract::EMAIL =>  'nullable|unique:users,email,'.$this->request->get('id'),
            Contract::FIRST_NAME    =>  'required|min:2|max:255',
            Contract::LAST_NAME =>  'required|min:2|max:255',
            Contract::BIRTHDATE =>  'required',
            Contract::PASSWORD  =>  'nullable|min:8|max:255',
            Contract::GENDER    =>  'required',
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
            //
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
            Contract::ROLE_ID   . '.required' =>  'Укажите роль',
            Contract::CITY_ID   . '.required' =>  'Укажите город',
            Contract::PHONE     . '.required' =>  'Укажите телефон номер',
            Contract::PHONE     . '.unique'   =>  'Телефон номер занят',
            Contract::EMAIL     . '.unique'   =>  'Эл.почта занят',
            Contract::FIRST_NAME    . '.required' =>  'Укажите имя',
            Contract::LAST_NAME     . '.required' =>  'Укажите фамилию',
            Contract::BIRTHDATE     . '.required' =>  'Укажите дату рождения',
        ];
    }
}
