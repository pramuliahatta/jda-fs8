<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateFileRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('name')) {
            $this->merge([
                'name' => ucwords($this->input('name'))
            ]);
        }
    }

    protected function passedValidation()
    {
        $this->multipart = [
            [
                'name'      => 'name',
                'contents'   => $this->validated()['name'],
            ],
            [
                "name" => "_method",
                "contents" => "PUT"
            ],
        ];

        if ($this->hasFile('file')) {
            $this->multipart[] = [
                'name' => 'file',
                'contents' => fopen($this->file('file')->getPathname(), 'r'),
                'filename' => $this->file('file')->getClientOriginalName(),
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
            'name.required' => 'Harap masukkan nama file',
            'name.string' => 'Format nama tidak valid',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'file.mimes' => 'Pastikan mengunggah file berbentuk PDF',
            'file.max' => 'File maksimal 2 MB',
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
