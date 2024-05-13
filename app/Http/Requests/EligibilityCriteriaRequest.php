<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EligibilityCriteriaRequest extends FormRequest
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
            'name' => 'required',
            'age_less_than' => 'required',
            'age_greater_than' => 'required|gte:age_less_than',
            'income_less_than' => 'required',
            'income_greater_than' => 'required|gte:income_less_than'
        ];
    }
}
