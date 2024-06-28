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
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" action="{{ route('articles') }}" method="get">
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
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari">
                            </div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
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
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="acara"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Acara</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="berita" type="checkbox" value="berita" name="category[]"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="berita"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Berita</label>
                                    </li>
                                </ul>
                                <button type="submit"
                                    class="mt-3 w-full bg-green-400 text-white py-2 px-4 rounded-lg hover:bg-green-500 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="grid gap-8 lg:grid-cols-2">
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
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filterDropdownButton');
        const filterDropdown = document.getElementById('filterDropdown');

        filterButton.addEventListener('click', function() {
            filterDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!filterButton.contains(event.target) && !filterDropdown.contains(event.target)) {
                filterDropdown.classList.add('hidden');
            }
        });
    });
</script>
