<x-layout>
    <x-slot name="title">Pengguna</x-slot>
    <!-- Modal content -->
    <x-dashboard-section route="dashboard.users.index">
        <!-- Modal header -->
        <div class="max-w-2xl">
            <div class="flex justify-between items-center rounded-t sm:mb-5 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Ubah Pengguna</h2>
            </div>
            <!-- Modal body -->
            <form action="{{ route('dashboard.users.update', $data['id']) }}" method="POST">
                @csrf

                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div>
                        <x-input-field label="Nama" name="name" id="name" placeholder="Masukkan nama"
                            value="{{ old('name', $data['name'] ?? '') }}" />
                        <x-error-message field="name" />
                    </div>

                    <div>
                        <x-input-field label="Email" name="email" id="email" placeholder="Masukkan email"
                            value="{{ old('email', $data['email'] ?? '') }}" />
                        <x-error-message field="email" />
                    </div>

                    <div>
                        <x-input-field label="Nomor WA" name="phone_number" id="phone_number" placeholder="Masukkan nomor WA"
                            value="{{ old('phone_number', $data['phone_number'] ?? '') }}" />
                        <x-error-message field="phone_number" />
                    </div>

                    <div>
                        <x-input-field label="Kata Sandi" type="password" name="password" id="password" placeholder="Masukkan kata sandi"
                            value="" />
                        <x-error-message field="password" />
                    </div>

                    <div>
                        <x-input-field label="Konfirmasi Kata Sandi" type="password" name="password_confirmation" id="password_confirmation" placeholder="Masukkan kata sandi sekali lagi"
                            value="" />
                        <x-error-message field="password_confirmation" />
                    </div>

                </div>
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>
