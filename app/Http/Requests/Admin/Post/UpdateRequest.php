<?php

namespace App\Http\Requests\Admin\Post;

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
        return [//так же марк обрати внимание, что в rules индифицирует данные по атрибуту name, в html
            'title' => 'required|string', //required как я понял для того чтоб поле было заполненно
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'int|exists:categories,id', // exists:categories,id  id без отступов!!
            'tags_ids' => 'required|array',
            'tags_ids.*' => 'required|int|exists:tags,id'
        ];
    }

    public  function messages(){
        return[
            'title.required' => 'this field is required field',
            'title.string' => 'only string type',
            'сontent.string' => 'only string type',
            'сontent.required' => 'this field is required field',
            'category_id.required' => 'you must select a like',
            'tags_ids.required' => 'you must select a min 1 tags',
            'tags_ids.*.required' => 'you must select a min 1 tags',
            'preview_image.required' => 'selected file',
            'preview_image.file' => 'selected file',
            'main_image.file' => 'selected file',
            'main_image.required' => 'selected file',
        ];
    }
}
