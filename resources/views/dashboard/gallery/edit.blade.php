<x-layout>

    <x-slot name="title">Galeri</x-slot>
    <!-- Modal content -->
    <x-dashboard-section route="dashboard.gallery.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Ubah Foto</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.gallery.update', $data['id']) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul Foto" name="title" id="title" placeholder="Masukkan judul foto"
                            value="{{ old('title', $data['title'] ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-image-uploader-viewer name="photo" id="photo" imagePath="{{ $data['photo'] ?? '' }}"
                            altText="Judul Foto" />
                        <x-error-message field="photo" />
                    </div>

                </div>
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
