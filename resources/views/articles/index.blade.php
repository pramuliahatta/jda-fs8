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

            <div class=" relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mb-12">
                <div
                    class="flex flex-col items-center justify-between p-3 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
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
                                            <input id="makanan" name="categories[]" type="checkbox" value="Makanan"
                                                {{ isset($data['categories']) ? (in_array('Makanan', $data['categories']) ? 'checked' : '') : '' }}
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                            <label for="makanan"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                Berita
                                            </label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="pakaian" name="categories[]" type="checkbox" value="Pakaian"
                                                {{ isset($data['categories']) ? (in_array('Pakaian', $data['categories']) ? 'checked' : '') : '' }}
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                            <label for="pakaian"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                Acara
                                            </label>
                                        </li>

                                    </ul>
                                    {{-- <button type="submit">Filter</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="mb-4 rounded-lg h-56 w-full object-cover"
                            src="https://images.pexels.com/photos/2489/street-building-construction-industry.jpg?auto=compress&cs=tinysrgb&w=600"
                            alt="road-construction">
                    </a>
                    <div class="flex justify-between items-center mb-2 text-gray-700">
                        <span
                            class="bg-blue-100 text-green-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                </path>
                            </svg>
                            Berita
                        </span>
                        <span class="text-sm">14 days ago</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">
                            Pembangunan Jalan Desa Baru
                        </a>
                    </h2>
                    <p class="mb-5 font-light text-gray-700 dark:text-gray-400">
                        Proyek pembangunan jalan desa baru telah dimulai minggu ini. Jalan baru ini diharapkan akan
                        meningkatkan aksesibilitas dan kenyamanan bagi warga desa, serta mempermudah transportasi hasil
                        pertanian dan produk lokal.
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="Jese Leos avatar" />
                            <span class="font-medium dark:text-white">
                                Jese Leos
                            </span>
                        </div>
                        <a href="{{ route('articles.detail', 1) }}"
                            class="inline-flex items-center font-medium text-green-500 dark:text-primary-500 hover:underline">
                            Baca Selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="mb-4 rounded-lg h-56 w-full object-cover"
                            src="https://images.pexels.com/photos/713644/pexels-photo-713644.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="festivals">
                    </a>
                    <div class="flex justify-between items-center mb-2 text-gray-700">
                        <span
                            class="bg-blue-100 text-green-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                </path>
                            </svg>
                            Berita
                        </span>
                        <span class="text-sm">14 days ago</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">
                            Festival Budaya Tahunan
                        </a>
                    </h2>
                    <p class="mb-5 font-light text-gray-700 dark:text-gray-400">
                        Festival budaya tahunan Desa Cidadap akan diselenggarakan bulan depan. Acara ini akan
                        menampilkan berbagai pertunjukan seni tradisional, pameran kerajinan tangan, dan bazar makanan
                        khas daerah.
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                alt="Bonnie Green avatar" />
                            <span class="font-medium dark:text-white">
                                Bonnie Green
                            </span>
                        </div>
                        <a href="{{ route('articles.detail', 1) }}"
                            class="inline-flex items-center font-medium text-green-500 dark:text-primary-500 hover:underline">
                            Baca Selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>
            {{-- <nav aria-label="Page navigation example">
                <ul class="mt-8 flex justify-end items-center -space-x-px h-8 text-sm">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-green-500 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav> --}}

            <div class="space-y-3 md:space-y-0 py-8" aria-label="Table navigation">
                @php
                    // TODO: DELETE LATER
                    $users = collect([
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
                        ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
                        ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                        ['id' => 4, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                        ['id' => 5, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
                        ['id' => 6, 'name' => 'Dave Williams', 'email' => 'dave@example.com'],
                        ['id' => 7, 'name' => 'Eve Davis', 'email' => 'eve@example.com'],
                        ['id' => 8, 'name' => 'Frank Moore', 'email' => 'frank@example.com'],
                        ['id' => 9, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
                        ['id' => 10, 'name' => 'Hank White', 'email' => 'hank@example.com'],
                        ['id' => 11, 'name' => 'Ivy Green', 'email' => 'ivy@example.com'],
                        ['id' => 12, 'name' => 'Jack Black', 'email' => 'jack@example.com'],
                    ]);

                    // Determine the current page
                    $currentPage = request()->get('page', 1);

                    // Define the number of items per page
                    $perPage = 4;

                    // Slice the users collection to get the items to display in the current page
                    $currentPageItems = $users->slice(($currentPage - 1) * $perPage, $perPage)->all();

                    // Create the paginator
                    $paginatedUsers = new Illuminate\Pagination\LengthAwarePaginator(
                        $currentPageItems,
                        $users->count(),
                        $perPage,
                        $currentPage,
                        [
                            'path' => request()->url(),
                            'query' => request()->query(),
                        ],
                    );
                @endphp

                {{ $paginatedUsers->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
    {{-- NEWS SECTION END --}}
</x-layout>
