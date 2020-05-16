<?php

namespace App\Http\Requests;

use App\Models\City;

class GetSlugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city' => [
                'nullable',
                function($attribute, $value, $fail) {
                    $isCityExist = City::whereRaw('lower(name->>"$.en") = lower(?)', $value)
                        ->orWhereRaw('lower(name->>"$.ua") = lower(?)', $value)
                        ->exists();

                    if (!$isCityExist){
                        $fail("The city '{$value}' was not found");
                    }
                }
            ]
        ];
    }
}
