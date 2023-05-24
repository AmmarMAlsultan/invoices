<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoices extends FormRequest
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
            'section_name'=>'required|unique:sections',
        ];
    }
    public function messages()
    {
        return [
            'section_name.required' => 'اسم القسم مطلوب يرجى ادخالة',
            'section_name.unique' => 'اسم القسم موجود مسبقا استخدم اسم اخر',
        ];
    }
}
