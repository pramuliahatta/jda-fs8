<x-layout>
    <x-slot name="title">Pengguna</x-slot>
    <!-- Modal content -->
    <x-dashboard-section route="dashboard.articles.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Ubah Artikel</h2>
            </div>
            <!-- Modal body -->
            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul" name="title" id="title" placeholder="Masukkan judul artikel"
                            value="{{ old('title', $photo->title ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-image-uploader-viewer name="photo" id="photo"
                            imagePath="{{ $photo->image_path ?? '' }}" altText="Foto" />
                        <x-error-message field="photo" />
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
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
