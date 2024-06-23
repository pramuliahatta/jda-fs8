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
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah
                </button>
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
