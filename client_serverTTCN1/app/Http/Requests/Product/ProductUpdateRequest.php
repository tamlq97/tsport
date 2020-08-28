<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'product_name' => 'required|max:190',
            'product_price' => 'required|min:0',
            'product_description' => 'required',
            'size' => 'array',
            'color' => 'array|required',
            'image' => 'array|max:2048',
            'picture' => 'max|2049',
            'second_image' => 'max|2049',
        ];
    }
}
