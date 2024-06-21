<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>

    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <div class="container mx-auto p-5">
                        <div class="flex flex-col items-center">
                            <!-- main Product galery -->
                            <div class="mb-4">
                                <img class="w-full dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                    alt="" />
                                <img class="w-full hidden dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                    alt="" />
                            </div>

                            <!--  Thumbnail galery  -->
                            <div class="mt-6 flex space-x-4">
                                <a href="#" onclick="changeImage('https://via.placeholder.com/300')">
                                    <img src="https://via.placeholder.com/100" alt="Thumbnail 1"
                                        class="thumbnail w-16 h-16 object-cover border-2 border-gray-300">
                                </a>
                                <a href="#"
                                    onclick="changeImage('https://via.placeholder.com/300/FF0000/FFFFFF')">
                                    <img src="https://via.placeholder.com/100/FF0000/FFFFFF" alt="Thumbnail 2"
                                        class="thumbnail w-16 h-16 object-cover border-2 border-gray-300">
                                </a>
                                <a href="#"
                                    onclick="changeImage('https://via.placeholder.com/300/00FF00/FFFFFF')">
                                    <img src="https://via.placeholder.com/100/00FF00/FFFFFF" alt="Thumbnail 3"
                                        class="thumbnail w-16 h-16 object-cover border-2 border-gray-300">
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>


                {{-- name of product --}}
                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        JANGKRIK (Jamu Organik)
                    </h1>
                    {{-- price --}}
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            Rp. 20.000/pack
                        </p>

                        <div class="flex items-center gap-2 mt-2 sm:mt-0">

                        </div>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">

                        {{-- seller contact --}}
                        <a href="#" title=""
                            class="text-white mt-4 sm:mt-0 bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
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
                            Kontak Penjual
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    {{-- description --}}
                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        Studio quality three mic array for crystal clear calls and voice
                        recordings. Six-speaker sound system for a remarkably robust and
                        high-quality audio experience. Up to 256GB of ultrafast SSD storage.
                    </p>

                    <p class="text-gray-500 dark:text-gray-400">
                        Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                        Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                        Magic Keyboard or Magic Keyboard with Touch ID.
                    </p>
                    
                    <div class="mt-4 sm:gap-4 sm:items-center sm:flex sm:mt-8 justify-end">
                        <a
                          href="{{route('productsDashboard')}}"
                          title=""
                          class="text-white mt-4 sm:mt-0 bg-blue-500 hover:bg-blue-500 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                          role="button"
                        >
                        <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                          </svg>
                          
                          Kembali
                        </a>
                      </div>
                </div>
            </div>
        </div>
    </section>
    
</x-layout>
