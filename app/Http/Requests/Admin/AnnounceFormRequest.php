<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:8'],
            'description' => ['required', 'min:8'],
            'adress' => ['required', 'min:8'],
            'city' => ['required', 'min:2'],
            'postalcode' => ['required', 'min:4'],
            'price' => ['required', 'min:1'],
            'availability' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id', 'required'],
            'categories' => ['array', 'exists:categories,id', 'required'],
            'pictures' => ['array'],
            'pictures.*' => ['image', 'max:4000']
        ];
    }
}
