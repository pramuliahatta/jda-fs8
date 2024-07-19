<x-layout>
    <x-slot name="title">Artikel</x-slot>

    {{-- NEWS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Berita & Update Desa
                </h2>
                <p class="font-light text-gray-700 sm:text-xl dark:text-gray-400">
                    Temukan berita dan informasi terbaru tentang berbagai kegiatan dan perkembangan di Desa Cidadap.
                    Kami selalu berupaya untuk memberikan informasi yang akurat dan terkini untuk warga desa dan
                    pengunjung.
                </p>
            </div>

            <div class=" relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mb-8">
                <div class="bg-white rounded-lg shadow dark:bg-gray-800">
                    <!-- Start coding here -->

                    <form id="articlesForm" action="{{ route('articles') }}" method="get">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="w-full md:w-1/2">
                                <label for="simple-search" class="sr-only">Cari</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-700 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" name="search"
                                        value="{{ request('search') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Cari">
                                </div>
                            </div>

                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Filter
                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </button>
                                <div id="filterDropdown"
                                    class="hidden z-10 w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Kategori</h6>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-center">
                                            <input id="acara" type="checkbox" value="acara" name="category[]"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                {{ in_array('acara', request('category', [])) ? 'checked' : '' }}>
                                            <label for="acara"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Acara</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="berita" type="checkbox" value="berita" name="category[]"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                {{ in_array('berita', request('category', [])) ? 'checked' : '' }}>
                                            <label for="berita"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Berita</label>
                                        </li>
                                    </ul>

                                    <h6 class="mt-3 mb-3 text-sm font-medium text-gray-900 dark:text-white">Urutkan</h6>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-center">
                                            <input id="asc" type="radio" value="asc" name="sort"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                {{ request('sort') == 'asc' ? 'checked' : '' }}>
                                            <label for="asc"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Terlama</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="desc" type="radio" value="desc" name="sort"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                {{ request('sort') == 'desc' ? 'checked' : '' }}>
                                            <label for="desc"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Terbaru</label>
                                        </li>
                                    </ul>

                                    <button type="submit"
                                        class="mt-3 w-full bg-green-500 font-medium text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600">Terapkan</button>
                                </div>

                                <!-- Add reset button conditionally -->
                                @if (request('search') || request('category'))
                                    <button id="resetButton"
                                        class="mt-4 w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Hapus Filter
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
                @if (count($data) > 0)
                    @foreach ($data as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                @endif

            </div>
            @if (count($data) < 1)
                <x-alert name="Artikel" />
            @endif

            <div class="space-y-3 md:space-y-0 py-8" aria-label="Table navigation">
                {{ $paginator->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
    {{-- NEWS SECTION END --}}
</x-layout>


<script>
    document.getElementById('resetButton')?.addEventListener('click', function() {
        const form = document.getElementById('articlesForm');

        // Clear all input fields
        form.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        form.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
        form.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);

        // Submit the form
        form.submit();
    });
</script>
