<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
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
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|gte:0',
            'user_id' => 'nullable',
            'photos' => 'required|array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
                'name'      => 'name',
                'contents'   => $this->validated()['name'],
            ],
            [
                'name'      => 'description',
                'contents'   => $this->validated()['description'],
            ],
            [
                'name'      => 'category',
                'contents'   => $this->validated()['category'],
            ],
            [
                'name'      => 'price',
                'contents'   => $this->validated()['price'],
            ],
            [
                'name'      => 'user_id',
                'contents'   => (Auth::user()->id?? $this->validated()['user_id']) ?? 1,
            ],
        ];

        if ($this->hasFile('photos')) {
            foreach ($this->file('photos') as $photo) {
                $this->multipart[] = [
                    'name' => 'photos[]',
                    'contents' => fopen($photo->getPathname(), 'r'),
                    'filename' => $photo->getClientOriginalName(),
                ];
            }
        }
    }

    public function getMultipart()
    {
        return $this->multipart;
    }

    public function messages()
    {
        return [
            'name.required' => 'Harap masukkan nama produk',
            'name.string' => 'Format nama tidak valid',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter',
            'description.required' => 'Harap masukkan deskripsi produk',
            'description.string' => 'Format deskripsi tidak valid',
            'category.required' => 'Harap pilih kategori',
            'category.string' => 'Format category tidak valid',
            'price.required' => 'Harap masukkan harga',
            'price.numeric' => 'Harga hanya boleh diisi dengan angka',
            'price.gte' => 'Harga harus lebih dari 0',
            'photos.required' => 'Harap unggah photo',
            'photos.max' => 'Maksimal hanya boleh 3 foto',
            'photos.*.image' => 'Format foto tidak valid',
            'photos.*.mimes' => 'Format foto tidak valid',
            'photos.*.max' => 'Ukuran maksimal foto 2 MB',
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
