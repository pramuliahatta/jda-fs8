<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|min:4|max:255',
            'phone_number' => 'required|min:7|max:20',
            'email' => 'required',
            'password' => 'nullable|min:4|confirmed',
            'password_confirmation' => 'nullable|min:4',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('name')) {
            $this->merge([
                'name' => ucwords(strtolower($this->input('name')))
            ]);
        }
    }

    protected function passedValidation()
    {
        $this->multipart = [
            [
                "name" => "_method",
                "contents" => "PUT"
            ],
            [
                'name'      => 'name',
                'contents'   => $this->validated()['name'],
            ],
            [
                'name'      => 'phone_number',
                'contents'   => $this->validated()['phone_number'],
            ],
            [
                'name'      => 'email',
                'contents'   => $this->validated()['email'],
            ],
            [
                'name'      => 'password',
                'contents'   => $this->validated()['password'],
            ],
            [
                'name'      => 'password_confirmation',
                'contents'   => $this->validated()['password_confirmation'],
            ],
        ];
    }

    public function getMultipart()
    {
        return $this->multipart;
    }

    public function messages()
    {
        return [
            'name.required' => 'Harap masukan nama pengguna',
            'name.string' => 'Format nama tidak valid',
            'name.min' => 'Nama tidak boleh kurang dari 4 karakter',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'phone_number.required' => 'Harap masukan nomor telepon',
            'phone_number.min' => 'Nomor telepon tidak boleh kurang dari 7 karakter',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter',
            'email.required' => 'Harap pilih kategori',
            'email.email' => 'Format email tidak valid',
            'password.min' => 'Kata sandi tidak boleh kurang dari 4 karakter',
            'password.confirmed' => 'Kata sandi harus sama dengan konfirmasi kata sandi',
            'password_confirmation.min' => 'Konfirmasi kata sandi tidak boleh kurang dari 4 karakter',
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
