<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'name' => 'required|unique:products|max:50',
            'categoryId' => 'required',
            'collectionId' => 'required',
            'price' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.require' => 'hoa phải có thật nha',
            'price.require' => 'giá cả phải chăng nhé',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->get('price') == '0') {
                $validator->errors()->add('note', 'Không thể free được');
            }
        });
    }
}
