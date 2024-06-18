<x-layout>
    <x-slot name="title">Pasar Desa</x-slot>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">

      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
            Pasar Desa
        </h2>
        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
          Pasar Desa hadir sebagai wadah yang menghubungkan pembeli dengan produk-produk unggulan dari pengusaha kecil dan menengah (UKM) warga Desa Cidadap.
        </p>
    </div>
        <div class="max-w-screen-xl px-4 mx-auto w-full">
                  <!-- Seacrhing -->
        <div class=" relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg ">
          <div class="flex flex-col items-center justify-between p-3 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div class="w-full md:w-1/2">
              <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                </div>
              </form>
            </div>
            <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
              

       
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
                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                    Category
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="apple"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Apple (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="fitbit"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Fitbit (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="dell" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="dell"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Dell (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="asus" type="checkbox" value="" checked
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="asus"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Asus (97)
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- list products --}}
            <div class="mt-2 sm:mt-2 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="xl:block">
                    <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
                        <div
                            class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <a href="#" class="overflow-hidden rounded">
                                <img class="mx-auto h-44 w-44 dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                    alt="imac image" />
                                <img class="mx-auto hidden h-44 w-44 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                    alt="imac image" />
                            </a>
                            <div>

                                {{-- product name --}}
                                <a href="#"
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">JANGKRIK”</a>

                                {{-- description products --}}
                                <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">Jamu yang terbuat
                                    dari 100% bahan organik</p>
                            </div>
                            <div>
                                {{-- discount price
                      <p class="text-lg font-bold text-gray-900 dark:text-white">
                        <span class="line-through"> Rp.30.000 </span>
                      </p> --}}
                                {{-- real price --}}
                                <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">Rp.20.000</p>
                            </div>

                            <div class="mt-6 flex items-center gap-2.5">
                                <button type="button"
                                    class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    {{-- <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"> --}}
                                    {{-- <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                        </svg> --}}
<<<<<<< HEAD
                        Detail Produk
                      </button>
                    </div>
                  </div>
                  <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#" class="overflow-hidden rounded">
                      <img class="mx-auto h-44 w-44 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-light.svg" alt="imac image" />
                      <img class="mx-auto hidden h-44 w-44 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-dark.svg" alt="imac image" />
                    </a>
                    <div>
                      <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Playstation 5</a>
                      <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation has some improvements, including a longer continuous battery life.</p>
                    </div>
                    <div>
                      <p class="text-lg font-bold text-gray-900 dark:text-white">
                        <span class="line-through"> $799,99 </span>
                      </p>
                      <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$499</p>
                    </div>
                    <div class="mt-6 flex items-center gap-2.5">
                      <button type="button" class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                        </svg>
                        Detail Produk
                      </button>
                    </div>
                  </div>
                  <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#" class="overflow-hidden rounded">
                      <img class="mx-auto h-44 w-44 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg" alt="imac image" />
                      <img class="mx-auto hidden h-44 w-44 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg" alt="imac image" />
                    </a>
                    <div>
                      <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple Watch Series 8</a>
                      <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation has some improvements, including a longer continuous battery life.</p>
                    </div>
                    <div>
                      <p class="text-lg font-bold text-gray-900 dark:text-white">
                        <span class="line-through"> $1799,99 </span>
                      </p>
                      <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$1199</p>
                    </div>
                    <div class="mt-6 flex items-center gap-2.5">
                      {{-- <button data-tooltip-target="favourites-tooltip-3" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
=======
                                    Detail Produk
                                </button>
                            </div>
                        </div>
                        <div
                            class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <a href="#" class="overflow-hidden rounded">
                                <img class="mx-auto h-44 w-44 dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-light.svg"
                                    alt="imac image" />
                                <img class="mx-auto hidden h-44 w-44 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-dark.svg"
                                    alt="imac image" />
                            </a>
                            <div>
                                <a href="#"
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Playstation
                                    5</a>
                                <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation
                                    has some improvements, including a longer continuous battery life.</p>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">
                                    <span class="line-through"> $799,99 </span>
                                </p>
                                <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$499</p>
                            </div>
                            <div class="mt-6 flex items-center gap-2.5">
                                {{-- <button data-tooltip-target="favourites-tooltip-2" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                        </svg>
                      </button> --}}
                                {{-- <div id="favourites-tooltip-2" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                        Add to favourites
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div> --}}
                                <button type="button"
                                    class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    {{-- <svg class="w-6 h-6 text-white-800 dark:text-white -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                        </svg> --}}

                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                    </svg>
                                    Detail Produk
                                </button>
                            </div>
                        </div>
                        <div
                            class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <a href="#" class="overflow-hidden rounded">
                                <img class="mx-auto h-44 w-44 dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                    alt="imac image" />
                                <img class="mx-auto hidden h-44 w-44 dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                    alt="imac image" />
                            </a>
                            <div>
                                <a href="#"
                                    class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple
                                    Watch Series 8</a>
                                <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This generation
                                    has some improvements, including a longer continuous battery life.</p>
                            </div>
                            <div>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">
                                    <span class="line-through"> $1799,99 </span>
                                </p>
                                <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$1199</p>
                            </div>
                            <div class="mt-6 flex items-center gap-2.5">
                                {{-- <button data-tooltip-target="favourites-tooltip-3" type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
>>>>>>> ccfad0778fb5e13c7c0a22a30d5cd6bf8a788e27
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                        </svg>
                      </button>
                      <div id="favourites-tooltip-3" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                        Add to favourites
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div> --}}

                                <button type="button"
                                    class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    {{-- <svg class="w-6 h-6 text-white-800 dark:text-white -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5"/>
                        </svg> --}}

                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                    </svg>
                                    Detail Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
              <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
      
                <div class="space-y-4">
                  <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">$7,592.00</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                      <dd class="text-base font-medium text-green-600">-$299.00</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">$799</dd>
                    </dl>
                  </div>
      
                  <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">$8,191.00</dd>
                  </dl>
                </div>
      
                <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Checkout</a>
      
                <div class="flex items-center justify-center gap-2">
                  <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                  <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                    Continue Shopping
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                  </a>
                </div>
              </div>
      
              <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <form class="space-y-4">
                  <div>
                    <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Do you have a voucher or gift card? </label>
                    <input type="text" id="voucher" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="" required />
                  </div>
                  <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply Code</button>
                </form>
              </div>
            </div> --}}
            {{-- <div class="relative overflow-hidden bg-white rounded-b-lg shadow-md dark:bg-gray-800"> --}}
            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                        class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
