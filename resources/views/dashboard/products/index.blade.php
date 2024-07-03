<x-layout>
    <x-slot name="title">Produk</x-slot>
    <!-- Start block -->

    <x-dashboard-section route='dashboard.products.index'>

        {{-- <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6"> --}}

        {{-- <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mb-4"> --}}

        <form id="productForm" action="{{ route('dashboard.products.index') }}" method="get">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <label for="simple-search" class="sr-only">Cari</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-700 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" name="search" value="{{ request('search') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari">
                    </div>
                </div>

                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        Filter
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                            Kategori
                        </h6>
                        <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                            <li class="flex items-center">
                                <input id="makanan" name="categories[]" type="checkbox" value="Makanan" {{ isset($categories) ? (in_array('Makanan', $categories) ? 'checked' : '') : '' }} class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="makanan" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Makanan
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="pakaian" name="categories[]" type="checkbox" value="Pakaian" {{ isset($categories) ? (in_array('Pakaian', $categories) ? 'checked' : '') : '' }} class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="pakaian" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Pakaian
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="minuman" name="categories[]" type="checkbox" value="Minuman" {{ isset($categories) ? (in_array('Minuman', $categories) ? 'checked' : '') : '' }} class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="minuman" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Minuman
                                </label>
                            </li>
                            <li class="flex items-center">
                                <input id="elektronik" name="categories[]" type="checkbox" value="Elektronik" {{ isset($categories) ? (in_array('Elektronik', $categories) ? 'checked' : '') : '' }} class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="elektronik" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Elektronik
                                </label>
                            </li>
                        </ul>
                        <button type="submit" class="mt-3 w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600">
                            Terapkan</button>

                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 px-4 pb-4">
                <div class="w-full md:w-1/2">
                    <!-- Add reset button conditionally -->
                    @if (request('search') || request('categories'))
                    <button type="button" id="resetButton" class="  text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Hapus Filter
                    </button>
                    @endif

                </div>
            </div>
        </form>


        {{-- table products --}}
        <div class="overflow-x-auto min-h-56">
            @if (count($data) > 0)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3 ">No</th>
                        <th scope="col" class="px-4 py-3 ">Foto Produk</th>
                        <th scope="col" class="px-4 py-3 ">Nama Produk</th>
                        <th scope="col" class="px-4 py-3 ">Kategori</th>
                        <th scope="col" class="px-4 py-3 ">Harga</th>
                        <th scope="col" class="px-4 py-3 ">Deskripsi</th>
                        <th scope="col" class="px-4 py-3 "><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $product)
                    <tr class=" border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </th>

                        <td class="px-4 py-3 max-w-[12rem] truncate">

                            @foreach ($product['product_photo'] as $productPhoto)
                            @if ($loop->first)
                            <img src="/{{ $productPhoto['photo'] }}" alt="productPhoto" class="w-8 h-8 rounded-lg object-cover">
                            @endif
                            @endforeach

                        </td>

                        <td scope="row" class="px-4 py-3 max-w-[12rem] truncate">
                            {{ $product['name'] }}
                        </td>
                        <td class="px-4 py-3 max-w-[12rem] truncate">
                            <span class="px-4 py-3 max-w-[12rem] truncate">
                                {{ $product['category'] }}</span>
                        </td>
                        <td class="px-4 py-3 max-w-[12rem] truncate">
                            <div class="flex items-center">
                                Rp. {{ number_format($product['price'], 0, ',', '.') }}
                            </div>
                        </td>
                        <td class="px-4 py-3 max-w-[12rem] truncate">
                            {{ \Illuminate\Support\Str::limit(strip_tags($product['description'])) }}

                        </td>
                        <td class="px-4 py-3 flex items-center justify-end">
                            <button id="{{ $product['id'] }}-dropdown-botton" data-dropdown-toggle="{{ $product['id'] }}-dropdown" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                            <div id="{{ $product['id'] }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm" aria-labelledby="{{ $product['id'] }}-dropdown-button">

                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.products.show', $product['id']) }}" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            Pratinjau
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal" data-id="{{ $product['id'] }}" class="delete-button flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                            <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif


            @if (count($data) < 1) <div class="px-4">
                <x-alert name="Produk" />
        </div>
        @endif

        <div class="space-y-3 md:space-y-0 py-4 px-4" aria-label="Table navigation">
            {{ $paginator->links('vendor.pagination.custom') }}
        </div>

        </div>



    </x-dashboard-section>
    <!-- End block -->


    <!-- Delete modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah Anda yakin ingin menghapus item ini?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batalkan
                    </button>
                    <form method="POST" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.getAttribute('data-id');

            document.getElementById('delete-form').setAttribute('action'
                , `/dashboard/products/${itemId}`);


        })
    })

    document.getElementById('resetButton')?.addEventListener('click', function() {
        const form = document.getElementById('productForm');

        // Clear all input fields
        form.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        form.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
        form.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);

        // Submit the form
        form.submit();
    });

</script>
