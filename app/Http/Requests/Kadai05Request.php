<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kadai05Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if($this->path() == 'kadai05_1'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'image_file' => ['required','image',],
        ];
    }

    public function messages()
    {
        return [
            //
            'image_file.required' => "ファイルは必須です。",
            'image_file.image' => "画像ファイルを指定してください。",
        ];
    }
}
