<?php

namespace App\Http\Requests\Dashboard\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesUpdateRequest extends FormRequest
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
        $rules = [

            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:20120|nullable',
            'parent_id'=>'nullable|exists:categories,id',

        ];

        foreach(config('app.languages') as $key => $value){
            $rules[$key.'*.title'] = 'string|nullable';
            $rules[$key.'*.content'] = 'string|nullable';
        }

        return $rules;
    }
}
