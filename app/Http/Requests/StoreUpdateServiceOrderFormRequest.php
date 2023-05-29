<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateServiceOrderFormRequest extends FormRequest
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
        return [
            'vehiclePlate' => 'required|max:7|string',
            'entryDateTime' => 'required',
            'exitDateTime' => 'required',
            'priceType' => 'required|max:55|string',
            'price' => 'numeric',
            'userId' => 'exists:users,id|required'
        ];
    }
}
