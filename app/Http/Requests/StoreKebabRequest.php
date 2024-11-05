<?php

namespace App\Http\Requests;

use App\Rules\TimeFormat;
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
            'address' => ['required', 'string', 'max:255'],
            'coordinatesX' => ['required', 'numeric'],
            'coordinatesY' => ['required', 'numeric'],
            'openingYear' => ['nullable', 'numeric'],
            'closingYear' => ['nullable', 'numeric'],
            'status' => ['required', 'string', 'max:255'],
            'isKraft' => ['required', 'boolean'],
            'isFoodTruck' => ['required', 'boolean'],
            'network' => ['nullable', 'string', 'max:255'],
            'appLink' => ['nullable', 'string', 'max:255'],
            'websiteLink' => ['nullable', 'string', 'max:255'],
            'hasGlovo' => ['nullable', 'boolean'],
            'hasPyszne' => ['nullable', 'boolean'],
            'hasUberEats' => ['nullable', 'boolean'],
            'phoneNumber' => ['nullable', 'string', 'max:255'],
            'mondayOpensAt' => ['required', new TimeFormat, 'max:255'],
            'mondayClosesAt' => ['required', new TimeFormat, 'max:255'],
            'tuesdayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'tuesdayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'wednesdayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'wednesdayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'thursdayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'thursdayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'fridayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'fridayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'saturdayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'saturdayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'sundayOpensAt' => ['nullable', new TimeFormat, 'max:255'],
            'sundayClosesAt' => ['nullable', new TimeFormat, 'max:255'],
            'meatTypeIds' => ['required', 'array'],
            'meatTypeIds.*' => ['integer', 'exists:meat_types,id'],
            'sauceIds' => ['required', 'array'],
            'sauceIds.*' => ['integer', 'exists:sauces,id'],
            'glovoUrl' => ['nullable'],
        ];
    }
}
