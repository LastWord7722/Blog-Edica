<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'email_verified_at' => 'nullable',
            'role_id' => 'required|int'
        ];
    }

    public  function messages(){
        return[
            'email.email' => 'This field must be an email',
            'email.unique' => 'The email has already been taken.'
        ];
    }
}
