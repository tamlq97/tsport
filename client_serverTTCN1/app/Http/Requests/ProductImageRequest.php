<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
        if(request('imageType') === 'file'){
            $rules = [
                'size' => 'array|required',
                'color_name' => 'required',
                'image' => 'array',
                'image.*' => 'required|mimes:jpg,jpeg,png,webp|max:20000',
            ];
        }
        else $rules = [
            'size' => 'array|required',
            'color_name' => 'required',
            'image' => 'string',
        ];
        return $rules;
    }
}
