<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JsonRequest extends FormRequest
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
            'priceFrom' => 'numeric',
            'price' => 'numeric',
            'priceTo' => 'numeric',
            'totalAreaFrom' => 'numeric',
            'totalArea' => 'numeric',
            'totalAreaTo' => 'numeric',
            'coveredAreaFrom' => 'numeric',
            'coveredArea' => 'numeric',
            'coveredAreaTo' => 'numeric',
            'numberRoomsFrom' => 'numeric',
            'numberRooms' => 'numeric',
            'numberRoomsTo' => 'numeric',
            'sortBy' => Rule::in(['price','covered_area','total_area','id','rooms_number']),
            'sortOrder' => Rule::in(['asc','desc']),
        ];
    }
}
