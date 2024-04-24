<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'email' => 'email|nullable',
            'logo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:20120|nullable',
            'favicon'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:20120|nullable',
            'phone'=> 'string|nullable',
            'facebook'=> 'string|nullable',
            'youtube'=> 'string|nullable',
            'twitter'=> 'string|nullable',
        ];

        foreach(config('app.languages') as $key => $value){
            $rules[$key.'*.name'] = 'string|nullable';
            $rules[$key.'*.address'] = 'string|nullable';
            $rules[$key.'*.content'] = 'string|nullable';
        }
        // dd($rules);
        return $rules;
    }

}
