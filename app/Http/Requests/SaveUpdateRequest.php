<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUpdateRequest extends FormRequest
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
            //house
            'title' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'total_area' => 'required|numeric',
            'covered_area' => 'required|numeric',
            'rooms_number' => 'required|integer',
            //property
            'light' => 'boolean',
            'natural_gas' => 'boolean',
            'phone' => 'boolean',
            'water' => 'boolean',
            'sewers' => 'boolean',
            'internet' => 'boolean',
            'asphalt' => 'boolean',
        ];
    }
}
