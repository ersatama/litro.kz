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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Contract::ROLE_ID   =>  'required|exists:roles,id',
            Contract::CITY_ID   =>  'required|exists:cities,id',
            Contract::PHONE =>  'required|unique:users,phone',
            Contract::EMAIL =>  'required|unique:users,email',
            Contract::FIRST_NAME    =>  'required|min:2|max:255',
            Contract::LAST_NAME =>  'required|min:2|max:255',
            Contract::BIRTHDATE =>  'required',
            Contract::PASSWORD  =>  'required|min:8|max:255',
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
            //
        ];
    }
}
