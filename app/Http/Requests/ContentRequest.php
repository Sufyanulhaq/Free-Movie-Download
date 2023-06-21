<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'piece'=>'required',
            'format'=>'required',
            'recommendation'=>'required',
            'description'=>'required',
            'price'=>'required',
            'file' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx',
            'category_id' => 'required',
        ];
    }
}
