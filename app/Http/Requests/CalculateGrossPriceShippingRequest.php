<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateGrossPriceShippingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'items'                => 'required|array',
            'items.*.amazon_price' => 'required|numeric',
            'items.*.width'        => 'required|numeric',
            'items.*.height'       => 'required|numeric',
            'items.*.depth'        => 'required|numeric',
            'items.*.weight'       => 'required|numeric',
        ];
    }
}
