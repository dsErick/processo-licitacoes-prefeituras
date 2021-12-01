<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:255'],
            'mandate_ends_at' => ['nullable', 'date_format:Y-m-d'],
            'contact_type_id' => ['required', 'exists:contact_types,id'],
            'city_hall_id'    => ['required', 'exists:city_halls,id'],
        ];
    }
}
