
<x-layout>
    <x-slot name="title">Formulir</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.forms.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah File</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Nama Formulir" name="name" id="name" placeholder="Masukkan formulir"
                            value="{{ old('name', $data->name ?? '') }}" />
                        <x-error-message field="name" />
                    </div>

                    <div>
                        <x-pdf-uploader /> 
                        <x-error-message field="file" />
                    </div>
                </div>
                <x-add-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>

