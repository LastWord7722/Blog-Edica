<?php

namespace App\Http\Requests\Admin\Category;

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
    public function rules()// rules= правила для массива который заходит
    {
        return [ // так же марк обрати внимание, что в rules индифицирует данные по атрибуту name, в html
            'title_category' => 'required|string', //required как я понял для того чтоб поле было заполненно
        ];
    }
}
