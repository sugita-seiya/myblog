<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     //認証のルールを書くところ。
    public function authorize()
    {
        return true;                //処理をなんでも通す。
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     //バリデーションのルール
    public function rules()
    {
        return [
            //
            'title' => 'required|min:3',
            'boby' => 'required'
        ];
    }

    //バリデーションのエラーメッセージをカスタマイズ
    public function messages() {
        return [
            'title.required'=> 'タイトルを入力してください。',
            'boby.required'=> '入力がされていません。'
        ];
    }
}
