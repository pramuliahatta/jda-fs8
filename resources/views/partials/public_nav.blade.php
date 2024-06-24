<nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/Lambang_Kabupaten_Majalengka.svg" class="h-12"
                alt="logo" />
            <span class="self-center hidden xl:block text-xs font-semibold whitespace-nowrap dark:text-white">
                PEMERINTAH KABUPATEN MAJALENGKA
                <br />
                KECAMATAN CINGAMBUL
                <br />
                DESA CIDADAP
            </span>
        </a>
        <div class="flex items-center lg:order-2">
            @if (!Auth::check())
                <a href="{{ route('login') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    Log in
                </a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        Log Out
                    </button>
                </form>
            @endif

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Beranda</x-nav-link>
                <x-nav-link href="#">Tentang Kami</x-nav-link>
                <x-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">Layanan</x-nav-link>
                <x-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">Pasar Desa</x-nav-link>
                <x-nav-link href="{{ route('gallery') }}" :active="request()->routeIs('gallery')">Galeri</x-nav-link>
                <x-nav-link href="{{ route('articles') }}" :active="request()->routeIs('articles')">Artikel</x-nav-link>
                <x-nav-link href="#">Kontak Kami</x-nav-link>
            </ul>
        </div>
    </div>
</nav>
