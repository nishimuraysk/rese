<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'area' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'summary' => ['required', 'string', 'max:255'],
            'image' => ['max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name' => '店舗名を入力してください',
            'area' => 'エリアを設定してください',
            'category' => 'カテゴリを設定してください',
            'summary' => '店舗紹介文を入力してください',
            'image' => '店舗画像を設定してください',
        ];
    }
}
