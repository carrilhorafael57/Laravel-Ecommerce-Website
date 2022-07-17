<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'street' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:40'],
            'postcode' => ['required', 'regex:^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$'],
            'province' => ['required', 'max:2'],
        ];
    }
}
