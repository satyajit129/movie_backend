<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'types' => 'required',
            'description' => 'required',
            'release_date' => 'nullable',
            'hours' => 'nullable',
            'minutes' => 'nullable',
            'seconds' => 'nullable',
            'director' => 'required',
            'casting' => 'nullable',
            'language' => 'required',
            'thumb_image' => 'nullable',
            'slider_image' => 'nullable',
            'trailer_url' => 'nullable',
            'download_url' => 'nullable',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
        ];
    }
}
