<x-layout>
    <x-slot name="title">Formulir</x-slot>
    <!-- Modal content -->
    <x-dashboard-section route="dashboard.forms.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Ubah File</h2>
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
            <form action="{{ route('dashboard.forms.edit', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Jenis Formulir" name="name" id="file"
                            placeholder="Masukkan jenis formulir" value="{{ old('file', $data['name'] ?? '') }}" />
                        <x-error-message field="file" />
                    </div>

                    <div>
                        <x-pdf-file-input pdf-url="/{{ $data['file'] }}" />
                        <x-error-message field="file" />
                    </div>
                </div>
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
