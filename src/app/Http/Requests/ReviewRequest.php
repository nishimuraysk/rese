<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'evaluation' => ['required', 'integer'],
            'comment' => ['required', 'max:250'],
        ];
    }

    public function messages()
    {
        return [
            'evaluation' => '評価を選択してください',
            'comment' => 'コメントを250文字以内で入力してください',
        ];
    }
}
