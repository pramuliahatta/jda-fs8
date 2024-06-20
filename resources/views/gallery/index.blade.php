<x-layout>
    <x-slot name="title">Galeri</x-slot>
    {{-- GALLERY SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Jelajahi Desa Kami
                </h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Lihatlah keindahan dan kehidupan sehari-hari di Desa Cidadap melalui galeri foto kami.
                </p>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="grid gap-4">
                        @foreach($data as $item)
                        <div>
                            <p>{{ $item['title'] }}</p>
                        </div>
                        @endforeach
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg"
                                data-title="Image Title 2" alt="Image Title 2">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg"
                                data-title="Image Title 3" alt="Image Title 3">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg"
                                data-title="Image Title 4" alt="Image Title 4">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg"
                                data-title="Image Title 5" alt="Image Title 5">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg"
                                data-title="Image Title 6" alt="Image Title 6">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg"
                                data-title="Image Title 7" alt="Image Title 7">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg"
                                data-title="Image Title 8" alt="Image Title 8">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg"
                                data-title="Image Title 9" alt="Image Title 9">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg"
                                data-title="Image Title 10" alt="Image Title 10">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg"
                                data-title="Image Title 11" alt="Image Title 11">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg gallery-item"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg"
                                data-title="Image Title 12" alt="Image Title 12">
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="flex justify-end items-center -space-x-px h-8 text-sm">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    {{-- GALLERY SECTION END --}}

    {{-- LIGHTBOX SECTION --}}
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center"
        style="display: none;">
        <div class="relative bg-white p-4 rounded-lg shadow-lg">
            <button id="close-lightbox" class="absolute top-2 right-2 text-black bg-white w-10 h-10 rounded-full p-2">
                &times;
            </button>
            <img id="lightbox-img" src="" alt=""
                class="w-56 h-56 sm:w-96 sm:h-96 object-cover rounded-lg">
            <h2 id="lightbox-title" class="text-center text-xl mt-4"></h2>
            <div class="flex justify-center mt-4">
                <button id="prev"
                    class="px-4 py-2 bg-white text-black mr-2 flex items-center gap-2 hover:bg-gray-100 w-10 h-10 rounded-full">
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                </button>
                <button id="next"
                    class="px-4 py-2 bg-white text-black flex items-center gap-2 hover:bg-gray-100 w-10 h-10 rounded-full">
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
    });
</script>
