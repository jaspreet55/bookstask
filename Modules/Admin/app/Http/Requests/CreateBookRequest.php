<?php

namespace Modules\Admin\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'  => 'required|min:2|max:100',
            'author'  => 'required|min:2|max:100',
            'description'  => 'required|string|max:10000',
            'genre'  => 'required|min:2|max:100',
            'isbn'  => 'required|min:2',
            'published'  => 'required|date|date_format:Y-m-d',
            'publisher'  => 'required|min:2|max:150',
            


        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
