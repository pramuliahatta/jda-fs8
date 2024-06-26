<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-16 px-16 mx-auto max-w-screen-md sm:py-16 lg:px-16 ">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Tambah Produk
                </h2>

            <form action="{{ route('products.stores') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Produk</label>
                <input id="photos" name="photos[]" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple required>
                    {{-- dropzone-file --}}
                    {{-- <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 mb-2"> --}}
                    {{-- <div class="flex items-center justify-center w-full ">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 md:h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                  </svg>
                                  
                                <p class=" text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Gambar Utama</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 px-6">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div> 
                    
                    <div class="flex items-center justify-center w-full ">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 md:h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                  </svg>
                                  
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Gambar 2</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 px-6">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>  --}}

                    <div class="w-full mt mb-2">
                        <x-input-field label="Nama Produk" name="name" id="name" placeholder="Masukkan nama produk"
                            value="{{ old('title', $photo->title ?? '') }}" />
                        <x-error-message field="name" />
                    </div>
                    <div class="w-full mt-2 mb-2">

                        <x-input-field label="Harga" name="price" id="price" placeholder="Masukkan harga produk (contoh: Rp 10.000)"
                        value="{{ old('title', $photo->title ?? '') }}" />
                    <x-error-message field="price" />
                    </div>
                    <div class="w-full mt-2 mb-2">
                        <x-input-field label="Kategori" name="category" id="category" placeholder="Masukkan kategori produk"
                        value="{{ old('title', $photo->title ?? '') }}" />
                    <x-error-message field="category" />
                    </div>
                    <div class="sm:col-span-2 mt-2 mb-2">
                       
                        <x-textarea-editor id="description" name="description" label="Deskripsi Produk"
                            value="
                            Masukkan deskripsi produk
                            {{-- {{ old('category', $article['body']) }} --}}
                             " 
                            />
                        <x-error-message field="description" />

                    </div>
                    <x-add-button />
            </form>
        </div>
      </section>
</x-layout>