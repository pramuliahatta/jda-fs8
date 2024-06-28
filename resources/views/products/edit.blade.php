<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-16 px-16 mx-auto max-w-screen-md lg:py-16 lg:px-16 ">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Edit Produk
                </h2>
                
                <form action="{{ route('products.updates', 1) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Produk</label>
                <input id="photos" name="photos[]" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple required>
                

                    <div class="w-full mt mb-2">
                        <x-input-field label="Nama Produk" name="name" id="name" placeholder="Masukkan nama produk"
                            value="{{ $data['name'] }}" />
                        <x-error-message field="name" />
                    </div>
                    <div class="w-full mt-2 mb-2">
                        <x-input-field label="Harga" name="price" id="price" placeholder="Masukkan harga produk (contoh: Rp 10.000)"
                        value="{{ $data['price'] }}" />
                    <x-error-message field="price" />
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Pilih Kategori</option>
                            <option value="Pakaian" {{ $data['category'] == "Pakaian" ? 'selected' : '' }}>Pakaian</option>
                            <option value="Makanan" {{ $data['category'] == "Makanan" ? 'selected' : '' }}>Makanan</option>
                            <option value="Minuman" {{ $data['category'] == "Minuman" ? 'selected' : '' }}>Minuman</option>
                            <option value="Elektronik" {{ $data['category'] == "Elektronik" ? 'selected' : '' }}>Elektronik</option>
                        </select>
                    </div> 
                    <div class="sm:col-span-2 mt-2 mb-2">
                       
                        <x-textarea-editor id="description" name="description" label="Deskripsi Produk"
                            value="{{ $data['description'] }}" />
                        <x-error-message field="description" /> 

                    <x-edit-button />
            </form>
        </div>
      </section>
</x-layout>