<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'price' => 'required|numeric|min:0',
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
                'contents'   => $this->validated()['user_id'] ?? null,
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
            'name.required' => 'Harap masukan nama produk',
            'name.string' => 'Format nama tidak valid',
            'name.max' => 'Nama produk tidak boleh lebih dari 255 karakter',
            'description.required' => 'Harap masukan deskripsi produk',
            'description.string' => 'Format deskripsi tidak valid',
            'category.required' => 'Harap pilih kategori',
            'category.string' => 'Format category tidak valid',
            'photos.image' => 'Format foto tidak valid',
            'photos.mimes' => 'Format foto tidak valid',
            'photos.max' => 'Photo maksimal 2 MB',
            'price.required' => 'Harap masukkan harga produk',
            'price.numeric' => 'Format harga tidak valid',
            'price.min' => 'Format harga tidak valid',
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
