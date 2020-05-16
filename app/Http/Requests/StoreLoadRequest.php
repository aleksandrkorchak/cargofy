<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoadRequest extends FormRequest
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
            'cityFrom' => "required|integer|exists:cities,id",
            'cityTo' => "required|integer|exists:cities,id",
            'enName' => "required|string|min:3|max:255",
            'uaName' => "required|string|min:3|max:255",
            'volume' => "required|numeric",
            'photo' => "required|file|image"

        ];
    }
}
