<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateGalleryRequest extends FormRequest
{
    protected $multipart = [];
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('title')) {
            $this->merge([
                'title' => ucwords($this->input('title'))
            ]);
        }
    }

    protected function passedValidation()
    {
        $this->multipart = [
            [
                'name'      => 'title',
                'contents'   => $this->validated()['title'],
            ],
            [
                "name" => "_method",
                "contents" => "PUT"
            ],
        ];

        if ($this->hasFile('photo')) {
            $this->multipart[] = [
                'name' => 'photo',
                'contents' => fopen($this->file('photo')->getPathname(), 'r'),
                'filename' => $this->file('photo')->getClientOriginalName(),
            ];
        }
    }

    public function getMultipart()
    {
        return $this->multipart;
    }

    public function messages()
    {
        return [
            'title.required' => 'Harap masukkan judul',
            'title.string' => 'Format judul tidak valid',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'photo.image' => 'Format photo tidak valid',
            'photo.mimes' => 'Format photo tidak valid',
            'photo.max' => 'Photo maksimal 2 MB',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(fails($validator->errors(), 422));
        }

        parent::failedValidation($validator);
    }
}
