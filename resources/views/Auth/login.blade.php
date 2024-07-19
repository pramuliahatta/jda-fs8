<x-layout>
    <x-slot name="title">Login</x-slot>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <img src="{{ asset('img/static/Lambang_Kabupaten_Majalengka.svg') }}" class="h-12, w-12" alt="logo" />
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-8 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="flex justify-center items-center">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Log in
                        </h1>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Anda</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-green-500"
                                placeholder="name@company.com">
                            <x-error-message field="email" />
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-green-500">
                            <x-error-message field="password" />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
