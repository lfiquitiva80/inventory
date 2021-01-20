<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'farm_id' => ['required', 'integer', 'exists:farms,id'],
            'lot_id' => ['required', 'integer', 'exists:lots,id'],
            'columna' => ['required', 'integer'],
            'fila' => ['required', 'integer'],
            'statu_id' => ['required', 'integer', 'exists:status,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
