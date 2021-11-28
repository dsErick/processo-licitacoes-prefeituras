<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityHallRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'phone_number' => preg_replace('/\D/', '', $this->phone_number),
        ]);
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'max:255'],
            'city_id'      => ['required', 'exists:cities,id'],
            'phone_number' => ['nullable', 'max:11'],
            'population'   => ['nullable', 'integer', 'min:0'],
        ];
    }
}
