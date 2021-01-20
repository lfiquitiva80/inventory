<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EradicationUpdateRequest extends FormRequest
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
            'disease_id' => ['required', 'integer', 'exists:diseases,id'],
            'type_id' => ['required', 'integer', 'exists:types,id'],
            'official_id' => ['required', 'integer', 'exists:officials,id'],
            'fecha_erradicacion' => ['required'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'observaciones' => ['required', 'string'],
            'inventory_id' => ['required', 'integer', 'exists:inventories,id'],
        ];
    }
}
