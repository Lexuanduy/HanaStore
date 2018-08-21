<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:50|min:10|unique:products',
            'price' => 'numeric',
            'image'=>'nullable|max:191',
            'sale' => 'numeric',
            'description'=>'required|max:191',
            'detail'=>'required|max:191'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.min' => 'Tên quá ngắn, vui lòng nhập ít nhất 10 ký tự.',
            'name.max' => 'Tên quá dài, vui lòng nhập nhiều nhất 50 ký tự.',
            'name.unique' => 'Tên đã được sử dụng, vui lòng chọn tên khác.',
            'description.required' => 'Vui lòng nhập mô tả cho sản phẩm.',
            'detail.required' => 'Vui lòng thông tin chi tiết cho sản phẩm.'
        ];
    }
}
