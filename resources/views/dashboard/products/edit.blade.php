<x-layout>
    <x-slot name="title">Galeri</x-slot>
    <x-dashboard-section route='dashboard.products.index'>
        <section class="bg-white dark:bg-gray-900">
            <div class="py-16 px-16 mx-auto max-w-screen-md lg:py-16 lg:px-16 ">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        Edit Produk
                    </h2>
                    <form action="{{ route('products.edit', 1) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                        <x-multi-image-uploader id="product-images" name="images" altText="Gambar Produk" :imagePaths="session('imagePaths', [])" />
                        <x-error-message field="photo" />
    
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
                        <x-edit-button />
                </form>
            </div>
          </section>
    </x-dashboard-section>
</x-layout>