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
            <form action="{{ route('dashboard.gallery.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul Foto" name="title" id="title" placeholder="Masukkan judul foto"
                            value="{{ old('title', $title ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-image-uploader-viewer name="photo" id="photo" imagePath="{{ $photo ?? '' }}"
                            altText="Judul Foto" />
                        <x-error-message field="photo" />
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd" />
                    </svg>
                    Ubah
                </button>
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
