<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreArticleRequest extends FormRequest
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
            'title'     => 'required|string|max:255',
            'body'      => 'required|string',
            'category'  => 'required|string',
            'photo'     => 'nullable|mimes:jpeg,jpg,png|max:2048'
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('title')) {
            $this->merge([
                'title' => ucwords(strtolower($this->input('title')))
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
                'name'      => 'body',
                'contents'   => $this->validated()['body'],
            ],
            [
                'name'      => 'category',
                'contents'   => $this->validated()['category'],
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
            'title.required' => 'Harap masukan judul artikel',
            'title.string' => 'Format judul tidak valid',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter',
            'body.required' => 'Harap masukan body artikel',
            'body.string' => 'Format body tidak valid',
            'category.required' => 'Harap pilih kategori',
            'category.string' => 'Format category tidak valid',
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
