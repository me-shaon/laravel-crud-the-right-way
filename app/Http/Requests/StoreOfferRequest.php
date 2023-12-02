<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreOfferRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => ['nullable', File::image()->max('10mb')],
            'categories' => ['required', 'array', 'min:1'],
            'locations' => ['required', 'array', 'min:1'],
        ];
    }
}
