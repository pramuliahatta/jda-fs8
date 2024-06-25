<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">

        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Pasar Desa
            </h2>
            <p class="font-light text-gray-700 lg:mb-16 sm:text-xl dark:text-gray-400">
                Pasar Desa hadir sebagai wadah yang menghubungkan pembeli dengan produk-produk unggulan dari pengusaha
                kecil dan menengah (UKM) warga Desa Cidadap.
            </p>
        </div>
        <div class="max-w-screen-xl px-4 mx-auto w-full">
            <!-- Seacrhing -->
            <div class=" relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg ">
                <div
                    class="flex flex-col items-center justify-between p-3 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-700 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">



                        {{-- filter --}}
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
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
                            <!-- Dropdown menu -->
                            <form method="GET" action="{{ route('products') }}">

                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                    Category
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="categories" name="categories[]" type="checkbox" value="Makanan" {{ isset($data['categories'])? (in_array('Makanan', $data['categories']) ? 'checked' : '') : '' }}
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="categories"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Makanan
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="categories" name="categories[]" type="checkbox" value="Pakaian" {{ isset($data['categories'])? (in_array('Pakaian', $data['categories']) ? 'checked' : '') : '' }}
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="categories"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Pakaian
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="categories" name="categories[]" type="checkbox" value="Minuman" {{ isset($data['categories'])? (in_array('Minuman', $data['categories']) ? 'checked' : '') : '' }}
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="categories"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Minuman
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="categories" name="categories[]" type="checkbox" value="Elektronik" {{ isset($data['categories'])? (in_array('Elektronik', $data['categories']) ? 'checked' : '') : '' }}
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="categories"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Elektronik
                                        </label>
                                    </li>
                                </ul>
                                <button type="submit">Filter</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- list products --}}
            <div class="mt-2 sm:mt-2 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="w-full mt-6 grid grid-cols-1 md:grid-cols-3 gap-4 sm:mt-8">
                        @foreach ($data['data'] as $product)
                            <div
                                class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <a href="#" class="overflow-hidden rounded">
                                    @if (!empty($product['product_photo']))
                                        @foreach ($product['product_photo'] as $productPhoto)
                                            @if ($loop->first)
                                                <img class="mx-auto h-64 w-full rounded-lg object-cover dark:hidden"
                                                    src="/upload/product/{{ $productPhoto['photo'] }}"
                                                    alt="imac image" />
                                                {{-- <img class="mx-auto hidden h-44 w-44 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                    alt="imac image" /> --}}
                                            @endif
                                        @endforeach
                                    @else
                                        <img class="mx-auto h-64 w-full rounded-lg object-cover dark:hidden" src="/upload/product/noimage.jpg"
                                            alt="imac image" />
                                        <img class="mx-auto hidden h-44 w-44 dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                            alt="imac image" />
                                    @endif
                                </a>
                                <div class="flex flex-col gap-3">
                                {{-- product name --}}
                                <a href="#"
                                    class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white capitalize truncate">{{ $product['name'] }}</a>
                                <p class="text-md text-gray-600">{{ substr($product['description'], 0, 75) }}...</p>
                                {{-- real price --}}
                                <p class="text-2xl font-semibold leading-tight text-gray-600 dark:text-white">
                                    {{ 'Rp. ' . number_format($product['price'], 0, ',', '.') }},-</p>
                            </div>

                            <div class="mt-6 flex items-center gap-2.5">
                                <a type="button" href="{{ route('products.detail', $product['id']) }}"
                                    class="inline-flex w-full items-center justify-center rounded-lg bg-green-500 px-5 py-2.5 text-sm font-medium  text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-200 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Lihat Produk
                                </a>
                            </div>
                        </div>
                    @endforeach
                {{-- </div> --}}
            </div>
            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                        class="font-semibold text-gray-900 dark:text-white">{{ count($data['data']) }}</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $data['total'] }}</span></span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="{{ $data['prev_page_url'] == null? '#' : str_replace(env('BASE_URL_API') . "products", url()->current(), $data['prev_page_url']) }}"
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-700 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                    @foreach (array_slice($data['links'], 1, count($data['links']) - 2) as $index=>$link)
                    <li>
                        <a href="{{ $link['url'] == null? '#' : str_replace(env('BASE_URL_API') . "products", url()->current(), $link['url']) }}&{{ http_build_query(['categories' => $data['categories']]) }}" aria-current="page"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight border {{ $link['active']? 'z-10 text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700' : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700'}} dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $index + 1 }}</a>
                    </li>
                    @endforeach
                    {{-- <li>
                        <a href="#" 
                            class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li> --}}
                    <li>
                        <a href="{{ $data['next_page_url'] == null? '#' : str_replace(env('BASE_URL_API') . "products", url()->current(), $data['next_page_url']) }}"
                            class="flex items-center justify-center h-full py-1.5 px-3 leading-tight rounded-r-lg border text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- </div> --}}
        </div>

        </div>
    </section>
</x-layout>
