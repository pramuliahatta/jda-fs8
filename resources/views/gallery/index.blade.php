<x-layout>
    <x-slot name="title">Galeri</x-slot>
    {{-- GALLERY SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Jelajahi Desa Kami
                </h2>
                <p class="font-light text-gray-700 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Lihatlah keindahan dan kehidupan sehari-hari di Desa Cidadap melalui galeri foto kami.
                </p>
            </div>

            <div
                class=" relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg @if (count($data) > 0) mb-8 @endif">
                <div class="bg-white rounded-lg shadow dark:bg-gray-800">
                    <!-- Start coding here -->

                    <form id="galleryForm" action="{{ route('gallery') }}" method="get">
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
                                        class="mt-3 w-full font-medium bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600">Terapkan</button>
                                </div>

                                <!-- Add reset button conditionally -->
                                @if (request('search') || request('sort'))
                                    <button type="button" id="resetButton"
                                        class="mt-4 w-full text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Hapus Filter
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="grid gap-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    @if (count($data) > 0)
                        @foreach ($data as $item)
                            <div class="cursor-pointer">
                                <img class="h-72 w-full rounded-lg gallery-item object-cover"
                                    src="/{{ $item['photo'] }}" data-title="{{ $item['title'] }}"
                                    alt="{{ $item['title'] }}">
                            </div>
                        @endforeach
                    @endif

                </div>
                @if (count($data) < 1)
                    <x-alert name="Foto" />
                @endif

            </div>

            <div class="space-y-3 md:space-y-0 py-8" aria-label="Table navigation">
                {{ $paginator->links('vendor.pagination.custom') }}
            </div>
    </section>
    {{-- GALLERY SECTION END --}}

    {{-- LIGHTBOX SECTION --}}
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-2"
        style="display: none;">
        <div class="relative bg-white p-4 rounded-lg shadow-lg w-full max-w-sm max-h-full">
            <button id="close-lightbox"
                class="absolute top-2 right-2 text-black bg-white hover:bg-green-100 w-10 h-10 rounded-full p-2">
                &times;
            </button>
            <figure>
                <img id="lightbox-img" src="" alt=""
                    class="w-full h-56 sm:w-96 sm:h-96 object-cover rounded-lg">
                <figcaption id="lightbox-title" class="text-center min-h-12 mt-4 w-full text-gray-700 capitalize">
                </figcaption>
            </figure>
            <div class="flex justify-center mt-4">
                <button id="prev"
                    class="px-4 py-2 bg-white text-black mr-2 flex items-center gap-2 hover:bg-green-100 w-10 h-10 rounded-full disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                </button>
                <button id="next"
                    class="px-4 py-2 bg-white text-black flex items-center gap-2 hover:bg-green-100 w-10 h-10 rounded-full disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    {{-- LIGHTBOX SECTION END --}}

</x-layout>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const galleryItems = document.querySelectorAll(".gallery-item");
        const lightbox = document.getElementById("lightbox");
        const lightboxImg = document.getElementById("lightbox-img");
        const lightboxTitle = document.getElementById("lightbox-title");
        const closeLightbox = document.getElementById("close-lightbox");
        const prevBtn = document.getElementById("prev");
        const nextBtn = document.getElementById("next");

        let currentIndex = 0;

        function openLightbox(index) {
            const item = galleryItems[index];
            lightboxImg.src = item.src;
            lightboxTitle.textContent = item.getAttribute("data-title");
            lightbox.style.display = "flex";
            currentIndex = index;

            // Update button states based on currentIndex
            updateButtonState();
        }

        function closeLightboxFn() {
            lightbox.style.display = "none";
        }

        function showNextImage() {
            currentIndex = (currentIndex + 1) % galleryItems.length;
            openLightbox(currentIndex);
        }

        function showPrevImage() {
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            openLightbox(currentIndex);
        }

        // Update button states based on currentIndex
        function updateButtonState() {
            if (galleryItems.length === 1) {
                prevBtn.disabled = true;
                nextBtn.disabled = true;
            } else {
                prevBtn.disabled = false;
                nextBtn.disabled = false;
            }
        }


        galleryItems.forEach((item, index) => {
            item.addEventListener("click", () => openLightbox(index));
        });

        closeLightbox.addEventListener("click", closeLightboxFn);
        nextBtn.addEventListener("click", showNextImage);
        prevBtn.addEventListener("click", showPrevImage);

        // Close lightbox when clicking outside the image
        lightbox.addEventListener("click", (e) => {
            if (e.target === lightbox) {
                closeLightboxFn();
            }
        });

        //Form reset
        document.getElementById('resetButton')?.addEventListener('click', function() {
            const form = document.getElementById('galleryForm');

            // Clear all input fields
            form.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
            form.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked =
                false);
            form.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);

            // Submit the form
            form.submit();
        });
    });
</script>
