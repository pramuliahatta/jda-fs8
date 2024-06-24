<x-layout>
    <x-slot name="title">Formulir</x-slot>
    <!-- Modal content -->
    <x-dashboard-section route="dashboard.forms.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Ubah File</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.forms.edit', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Judul File" name="file" id="file" placeholder="Masukkan file"
                            value="{{ old('file', $file ?? '') }}" />
                        <x-error-message field="file" />
                    </div>

                    <div>
                        <x-pdf-uploader/>
                        <x-error-message field="file" />
                    </div>
                </div>
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
