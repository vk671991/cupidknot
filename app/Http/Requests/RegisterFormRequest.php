<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'digits:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'string'],
            'annual_income' => ['required', 'integer', 'min:'],
            'occupation' => ['string'],
            'famiy_type' => ['string'],
            'manglik' => ['string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'prefered_annual_income' => ['required', 'string'],
            'prefered_occupation' => ['required', 'string'],
            'prefered_famiy_type' => ['required', 'string'],
            'prefered_manglik' => ['required', 'string'],
        ];
    }

}
