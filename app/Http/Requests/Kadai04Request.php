<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Kadai04Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if($this->path() == 'kadai04_1'){
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
            'student_id' => ['required', 'digits:7'],
            'email' => ['required', 'email'],
            'course' => ['numeric'],
            'note' => [],
        ];
    }

    public function messages() {
        return [
            'name.required' => '名前が⼊⼒されていません',
            'student_id.required' => '学籍番号が⼊⼒されていません',
            'student_id.digits:7' => '学籍番号は７桁の数字です',
            'email.required' => 'メールが⼊⼒されていません',
            'email.email' => 'メールアドレスの形式が間違っています',
            'id.digits:7' => 'コース番号を送ってください',

        ];
    }
}
