<?php

namespace App\Http\Requests\Dashboard\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostsUpdateRequest extends FormRequest
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
             'category_id'=>'nullable|exists:categories,id',

         ];

         foreach(config('app.languages') as $key => $value){
             $rules[$key.'*.title'] = 'string|nullable';
             $rules[$key.'*.content'] = 'string|nullable';
             $rules[$key.'*.smallDesc'] = 'string|nullable';
             $rules[$key.'*.tags'] = 'string|nullable';
         }

         return $rules;
     }
}
