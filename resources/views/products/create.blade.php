<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-16 px-16 mx-auto max-w-screen-md sm:py-16 lg:px-16 ">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Tambah Produk
            </h2>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                    Produk</label>
                <input id="photos" name="photos[]" type="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    multiple required>




                <div class="w-full mt mb-2">
                    <x-input-field label="Nama Produk" name="name" id="name" placeholder="Masukkan nama produk"
                        value="{{ old('name', $product->name ?? '') }}" />
                    <x-error-message field="name" />
                </div>
                <div class="w-full mt-2 mb-2">

                    <x-input-field label="Harga" name="price" id="price"
                        placeholder="Masukkan harga produk (contoh: 10000)"
                        value="{{ old('price', $product->name ?? '') }}" />
                    <x-error-message field="price" />
                </div>
                <div>
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select required name="category" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="Pakaian">Pakaian</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Elektronik">Elektronik</option>
                    </select>
                </div>
                <div class="sm:col-span-2 mt-2 mb-2">

                    <x-textarea-editor id="description" name="description" label="Deskripsi Produk"
                        value="
                            Masukkan deskripsi produk
                            {{-- {{ old('description', $article['body']) }} --}}
                             " />
                    <x-error-message field="description" />

                </div>
                <x-add-button />
            </form>
        </div>
    </section>
</x-layout>
