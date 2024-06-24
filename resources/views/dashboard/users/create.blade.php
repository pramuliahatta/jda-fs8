<x-layout>
    <x-slot name="title">Pengguna</x-slot>
    <!-- Create modal -->
    <x-dashboard-section route="dashboard.users.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Pengguna</h2>
            </div>
            <!-- Modal body -->
            <form {{-- action="{{ route('dashboard.users.store') }}"  --}} method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Nama" name="name" id="name" placeholder="Masukkan nama"
                            value="{{ old('name', $user->name ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-input-field label="Email" name="email" id="email" placeholder="Masukkan email"
                            value="{{ old('email', $user->email ?? '') }}" />
                        <x-error-message field="title" />
                    </div>

                    <div>
                        <x-input-field label="Nomor WA" name="phone" id="phone" placeholder="Masukkan nomor WA"
                            value="{{ old('phone', $user->phone ?? '') }}" />
                        <x-error-message field="phone" />
                    </div>

                    <div>
                        <x-input-field label="Password" name="password" id="password" placeholder="Masukkan password"
                            value="{{ old('password', $user->password ?? '') }}" />
                        <x-error-message field="password" />
                    </div>

                </div>
                <x-add-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
