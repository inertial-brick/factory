<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealIndexRequest extends FormRequest
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
            'with' => 'string|valid_with_parameters:category,tags,ingredients',
            'diff_time' => 'numeric|min:0',
            'lang' => 'string|in:en,hr',
            'per_page' => 'numeric|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'diff_time.numeric' => 'The diff_time must be a number.',
            'diff_time.min' => 'The diff_time must be at least :min.',
            'with.valid_with_parameters' => 'Invalid value for the "with" parameter. Allowed values are: category, tags, ingredients.',
            'lang.in' => 'Invalid value for the "lang" parameter. Allowed values are: en, hr.',
            'per_page.numeric' => 'The per_page must be a number.',
            'per_page.min' => 'The per_page must be at least :min.',
        ];
    }
}
