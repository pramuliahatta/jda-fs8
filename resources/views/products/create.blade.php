<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-16 px-16 mx-auto max-w-screen-md sm:py-16 lg:px-16 ">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Tambah Produk
                </h2>
            <form action="#">

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
                    <x-add-button />
            </form>
        </div>
      </section>
</x-layout>