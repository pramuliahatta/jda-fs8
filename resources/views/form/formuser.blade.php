<x-layout>

    <x-slot name="title">Layanan</x-slot>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl ">
            <!-- Start coding here -->
            <div class="mx-auto max-w-screen-lg text-center mb-2 mt-8 lg:mb-8">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Layanan Desa Kami
                </h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Kami menyediakan layanan kebutuhan formulir adminitrasi warga.
                    <br />
                    Silahkan unduh formulir adminitrasi warga di sini.
                </p>

                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('services') }}" method="get">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" name="search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Cari"
                                        value="{{ request()->query('search') ? request()->query('search') : '' }}">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">No</th>
                                    <th scope="col" class="px-4 py-4">Jenis Formulir</th>
                                    {{-- <th scope="col" class="px-4 py-3">Keterangan</th> --}}
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-4 py-3 max-w-[12rem] truncate">
                                            {{ $item['name'] }}
                                        </td>
                                        {{-- <td class="px-4 py-3 max-w-[12rem] truncate">{{ $item['file'] }}</td> --}}
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <a type="button" href="/{{ $item['file'] }}" target="_blank"
                                                class="w-48 text-white mt-4 sm:mt-0 bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-green-200-800 flex items-center justify-center">
                                                <svg class="w-5 h-5 -ms-1 me-1 text-white-800 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                                        clip-rule="evenodd" />
                                                </svg>Unduh di Sini</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                        {{ $paginator->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
    </section>
</x-layout>
