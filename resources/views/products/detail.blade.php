<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>

    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg ">
                    <div class="container mx-auto ">

                        <!-- main Product galery -->
                        <div id="custom-controls-gallery" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <!-- Item 1 -->
                                @foreach($data['product_photo'] as $productPhoto)
                                <div class="hidden ease-in-out" data-carousel-item>
                                    <img src="/upload/product/{{ $productPhoto['photo'] }}"
                                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="">
                                </div>
                                @endforeach

                            </div>
                            @if(sizeOf($data['product_photo']) > 1)
                            <div class="flex justify-center items-center pt-4">
                                <button type="button"
                                    class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                        <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                                        <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                            @endif
                        </div>


                        {{-- </div> --}}
                    </div>
                </div>


                {{-- name of product --}}
                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white capitalize">
                        {{ $data['name'] }}
                    </h1>
                    {{-- price --}}
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-semibold text-gray-800 dark:text-white">
                            Rp. {{ number_format($data['price'], 0, ',', '.') }},-
                        </p>
                    </div>

                    {{-- seller contact --}}

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8 capitalize">
                        <a href="https://wa.me/628882204001?text=Halo,%20saya%20tertarik%20untuk%20membeli%20produk%20ini"
                            target="_blank" title=""
                            class="text-white mt-4 sm:mt-0 bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"

                            role="button">
                            <svg class="w-6 h-6 text-white-800 dark:text-white -ms-2 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                    clip-rule="evenodd" />
                                <path fill="currentColor"
                                    d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                            </svg>
                            Beli Sekarang
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    {{-- description --}}
                    <p class="mb-6 text-gray-700 dark:text-gray-700">
                        Studio quality three mic array for crystal clear calls and voice
                        recordings. Six-speaker sound system for a remarkably robust and
                        high-quality audio experience. Up to 256GB of ultrafast SSD storage.
                    </p>

                    <p class="text-gray-700 dark:text-gray-700">
                        Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                        Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                        Magic Keyboard or Magic Keyboard with Touch ID.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layout>
