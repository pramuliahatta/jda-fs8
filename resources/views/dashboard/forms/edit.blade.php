
<x-layout>
    <x-slot name="title">Formulir</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.users.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Formulir</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.users.store') }}"  method="POST" {{-- enctype="multipart/form-data" --}}>
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Nama Formulir" name="name" id="name" placeholder="Masukkan nama"
                        value="{{ old('name', $user->name ?? '') }}" />
                        <x-error-message field="title" />
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran Formulir</label>
                            <input id="photos" name="photos[]" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple required>
                        </div>
                    </div>

                </div>
                <x-add-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
