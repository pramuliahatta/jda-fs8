<x-layout>
    <x-slot name="title">Galeri</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.gallery.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Foto</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul Foto" name="title" id="title" placeholder="Masukkan judul foto"
                            value="{{ old('title', $photo->title ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-image-uploader-viewer name="photo" id="photo"
                            imagePath="{{ $photo->image_path ?? '' }}" altText="Judul Foto" />
                        <x-error-message field="photo" />
                    </div>
                </div>
                <x-add-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
