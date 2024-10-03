<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKebabRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['image', 'nullable'],
            'address' => ['required', 'string', 'max:255'],
            'coordinatesX' => ['required', 'numeric'],
            'coordinatesY' => ['required', 'numeric'],
            'openingYear' => ['nullable', 'int'],
            'closingYear' => ['nullable', 'int'],
            'status' => ['required', 'string', 'max:255'],
            'isKraft' => ['required', 'boolean'],
            'isFoodTruck' => ['required', 'boolean'],
            'network' => ['nullable', 'string', 'max:255'],
            'appLink' => ['nullable', 'string', 'max:255'],
            'websiteLink' => ['nullable', 'string', 'max:255'],
        ];
    }
}
