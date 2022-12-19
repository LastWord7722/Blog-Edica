<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'=>'required|string|unique:users,email,' . $this->user_id, //исключения правила по ид юзера
            'email_verified_at' => 'nullable',
            'password' => 'required|string|min:5',
            'user_id' => 'required|int|exists:users,id',
            'role_id' => 'required'
        ];
    }

    public  function messages(){
        return[
            'password.min:5' => 'password length must be more than 5 characters',
            'email.email' => 'This field must be an email',
            'email.unique:users' => 'User with this email exists'
        ];
    }
}
