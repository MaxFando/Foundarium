<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class RentCarRequest extends FormRequest
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
            'mark' => 'required|string|exists:cars,mark',
            'client_id' => 'required|int|exists:clients,id',
        ];
    }

    public function messages()
    {
        return [
            'mark.required' => 'Не была передана марка машины',
            'mark.exists' => 'Такой марки машины у нас нет',
            'client_id.exists' => 'Такого пользователя не существует',
        ];
    }
}
