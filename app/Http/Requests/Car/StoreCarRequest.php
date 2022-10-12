<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'mark' => 'required|string',
            'price' => 'required|integer',
            'client_id' => 'nullable|int|exists:clients,id',
        ];
    }

    public function messages()
    {
        return [
            'mark.required' => 'Не была передана марка машины',
            'price.required' => 'Не была передана цена',
            'client_id.exists' => 'Такого клиента не существует',
        ];
    }
}
