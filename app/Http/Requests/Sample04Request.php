<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Sample04Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if($this->path() == 'sample04'){
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
            'name' => ['required'],
            'email' => ['required', 'email'],
        ];
    }


    public function messages() {
        return [
            'name.required' => '名前が⼊⼒されていません',
            'email.required' => 'メールが⼊⼒されていません',
            'email.email' => 'メールアドレスの形式が間違っています',
        ];
    }
}
