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
            <form id="user-form" action="{{ route('dashboard.users.update', $data['id']) }}" method="POST">
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
                        <div class="sm:col-span-2">
                            <label for="phone_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nomor WA
                            </label>
                            <div class="flex items-center">
                                <div
                                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                    +62
                                </div>
                                <div class="relative w-full">
                                    <input type="number" id="phone_number_display" name="phone_number_display"
                                        value="{{ old('phone_number', isset($data['phone_number']) ? substr($data['phone_number'], 2) : '') }}"
                                        pattern="[0-9]{10,11}"
                                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="8881234567" />
                                </div>
                            </div>
                            <x-error-message field="phone_number" />
                        </div>
                    </div>

                    <div>
                        <x-input-field label="Kata Sandi" type="password" name="password" id="password"
                            placeholder="Masukkan kata sandi" value="" />
                        <x-error-message field="password" />
                    </div>

                    <div>
                        <x-input-field label="Konfirmasi Kata Sandi" type="password" name="password_confirmation"
                            id="password_confirmation" placeholder="Masukkan kata sandi sekali lagi" value="" />
                        <x-error-message field="password_confirmation" />
                    </div>

                </div>
                <x-edit-button />
            </form>
        </div>
    </x-dashboard-section>
</x-layout>

<script>
    document.getElementById('user-form').addEventListener('submit', function(event) {
        var phoneInputDisplay = document.getElementById('phone_number_display');
        var hiddenPhoneInput = document.createElement('input');
        hiddenPhoneInput.type = 'hidden';
        hiddenPhoneInput.name = 'phone_number';
        hiddenPhoneInput.value = '62' + phoneInputDisplay.value;
        document.getElementById('user-form').appendChild(hiddenPhoneInput);

        // Remove the original phone number input's name attribute to avoid duplicate submission
        phoneInputDisplay.removeAttribute('name');
    });
</script>
