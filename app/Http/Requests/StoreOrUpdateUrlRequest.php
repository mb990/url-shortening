<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateUrlRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'original'  => 'required|url|unique:urls,original',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $rules['original'] = [
                'sometimes',
                'url',
            ];

            $rules['total_visits'] = [
                'sometimes',
                'boolean',
            ];
        }

        return $rules;
    }
}
