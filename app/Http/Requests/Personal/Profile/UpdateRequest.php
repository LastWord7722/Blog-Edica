<?php

namespace App\Http\Requests\Personal\Profile;

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
            'email'=> 'email',
            'image_avatar' => 'required | mimes:jpeg,jpg,png | max:1000',
        ];

    }
}
