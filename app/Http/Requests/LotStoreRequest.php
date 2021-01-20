<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotStoreRequest extends FormRequest
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
            'FINCACODI' => ['required', 'string', 'max:255'],
            'LOTECODCC' => ['required', 'string', 'max:255'],
            'LOTECODI' => ['required', 'string', 'max:255'],
            'LOTENOMB' => ['required', 'string', 'max:255'],
        ];
    }
}
