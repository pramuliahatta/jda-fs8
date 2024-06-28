<x-layout>
    <x-slot name="title">Artikel</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.articles.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Artikel</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul" name="title" id="title" placeholder="Masukkan judul artikel"
                            value="{{ old('title', $article['photo'] ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-image-uploader-viewer name="photo" id="photo"
                            imagePath="{{ $photo->image_path ?? '' }}" altText="Foto" />
                        <x-error-message field="photo" />
                    </div>

                    <label for="category"
                        class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="" disabled>Pilih kategori</option>
                        <option value="Berita">Berita</option>
                        <option value="Acara">Acara</option>
                    </select>

                    <div>
                        @php
                            // Example values
                            $article = [
                                'body' => 'Your previous article content here...',
                            ];
                        @endphp
                        <x-textarea-editor id="body" name="body" label="Artikel"
                            value="{{ old('body', $article['body']) }}" />
                        <x-error-message field="body" />
                    </div>
                </div>
                <x-add-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
