<x-layout>
    <x-slot name="title">Artikel</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.articles.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Artikel</h2>
            </div>
            @if (@session('success'))
                <p>{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Modal body -->
            <form action="{{ route('dashboard.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul" name="title" id="title" placeholder="Masukkan judul artikel"
                            value="{{ old('title', $article['photo'] ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    {{-- <div>
                        <x-image-uploader-viewer name="photo" id="photo"
                            imagePath="{{ $photo->image_path ?? '' }}" altText="Foto" />
                        <x-error-message field="photo" />
                    </div> --}}



                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                            artikel</label>
                        <select id="category" name="category"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih kategori artikel</option>
                            <option value="event">Event</option>
                            <option value="berita">Berita</option>
                        </select>
                    </div>

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
