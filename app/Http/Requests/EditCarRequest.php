<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCarRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'brand' => ['required', 'string', 'max:128'],
            'model' => ['required', 'string', 'max:128'],
            'year' => ['required', 'numeric', 'min:1886', 'max:2886'],
            'manufactured' => ['required', 'numeric', 'min:1886', 'max:2886'],
            'plate' => ['required', 'string', 'max:32'],
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
