<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => ['required', 'date', 'after:tomorrow'],
            'time' => ['required', 'date_format:H:i'],
            'number' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'date' => '明日以降の日付を選択してください',
            'time' => '時間を選択してください',
            'number' => '人数を選択してください',
        ];
    }
}
