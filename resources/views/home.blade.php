<x-layout>
    <x-slot name="title">Beranda</x-slot>

    {{-- HERO SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Selamat Datang di Desa Cidadap
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Desa Cidadap, sebuah desa yang kaya akan budaya dan tradisi, siap menyambut Anda dengan kehangatan
                    dan keindahannya.
                </p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Pelajari Lebih Lanjut
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>
        </div>
    </section>
    {{-- HERO SECTION END --}}

    {{-- STATISTICS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-gray-100 rounded-lg max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">5000+</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">penduduk</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">150km<sup>2</sup></dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">luas wilayah</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">10 RT/5 RW</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">jumlah RT/RW</dd>
                </div>
            </dl>
        </div>
    </section>
    {{-- STATISTICS SECTION END --}}

    {{-- PUBLIC SERVICES SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full dark:hidden"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup.svg"
                alt="dashboard image">
            <img class="w-full hidden dark:block"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg"
                alt="dashboard image">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Layanan Masyarakat
                </h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
                    Kami menyediakan berbagai layanan untuk memenuhi kebutuhan masyarakat Desa Cidadap. Unduh formulir
                    yang diperlukan dan datang langsung ke kantor desa.
                </p>
                <a href="{{ route('services') }}"
                    class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                    Unduh Formulir
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    {{-- PUBLIC SERVICES SECTION END --}}

    {{-- NEWS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Berita & Update Desa
                </h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Temukan berita dan informasi terbaru tentang berbagai kegiatan dan perkembangan di Desa Cidadap.
                    Kami selalu berupaya untuk memberikan informasi yang akurat dan terkini untuk warga desa dan
                    pengunjung.
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 object-cover w-full"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Pembangunan Jalan Desa Baru
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Proyek pembangunan jalan desa baru telah dimulai minggu ini. Jalan baru ini diharapkan akan
                            meningkatkan aksesibilitas dan kenyamanan bagi warga desa, serta mempermudah transportasi
                            hasil pertanian dan produk lokal.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 object-cover w-full"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Festival Budaya Tahunan
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Festival budaya tahunan Desa Cidadap akan diselenggarakan bulan depan. Acara ini akan
                            menampilkan berbagai pertunjukan seni tradisional, pameran kerajinan tangan, dan bazar
                            makanan khas daerah.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 w-full object-cover"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Program Pelatihan Pertanian Modern
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Program pelatihan pertanian modern yang bertujuan untuk meningkatkan produktivitas petani
                            desa akan dimulai minggu depan. Program ini mencakup teknik pertanian terbaru, penggunaan
                            teknologi, dan manajemen lahan.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- NEWS SECTION END --}}

    {{-- NEXT EVENT SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-gray-100 rounded-lg py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Acara Mendatang
                </h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Jangan lewatkan berbagai acara menarik yang akan berlangsung di Desa Cidadap. Bergabunglah dalam
                    kegiatan-kegiatan kami dan rasakan kebersamaan serta kekayaan budaya desa.
                </p>
            </div>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 object-cover w-full"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Lomba Memasak Tradisional
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Ikuti lomba memasak dengan resep-resep tradisional Desa Cidadap. Acara ini terbuka untuk
                            semua warga desa dan pemenang akan mendapatkan hadiah menarik.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 object-cover w-full"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Gotong Royong Desa
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Ayo bersama-sama membersihkan lingkungan desa dalam kegiatan gotong royong. Ini adalah
                            kesempatan untuk mempererat silaturahmi dan menjaga kebersihan desa kita.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg h-80 w-full object-cover"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Bazar Produk Lokal
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Bazar yang menjual produk-produk lokal hasil karya warga desa akan diadakan di alun-alun
                            desa. Dukung ekonomi lokal dengan membeli produk-produk berkualitas dari tetangga Anda.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Baca Selengkapnya
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- NEXT EVENT SECTION END --}}

    {{-- MARKETPLACE SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Pasar Desa
                </h2>
                <p class="mb-4">
                    Temukan berbagai produk lokal berkualitas dari kerajinan tangan, makanan khas, hingga pakaian
                    tradisional yang dibuat oleh warga desa. Dukung ekonomi lokal dengan berbelanja di sini.
                </p>

                <a href="#"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Kunjungi Sekarang
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="bg-gray-100 rounded-lg py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Ingin menjual produk Anda di Pasar Desa Cidadap?
                </h2>
                <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                    Daftar sekarang dan mulai menjual produk lokal Anda kepada lebih banyak orang. Bergabunglah dengan
                    komunitas penjual kami dan dukung ekonomi desa.
                </p>
                <a href="#"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Daftar Sebagai Penjual
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    {{-- MARKETPLACE SECTION END --}}

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
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg"
                                alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- GALLERY SECTION END --}}

    {{-- TESTIMONIALS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Apa Kata Warga Kami
                </h2>
                <p class="mb-8 font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Dengar langsung dari warga Desa Cidadap tentang pengalaman dan kesan mereka mengenai desa kita.
                    Testimoni ini menunjukkan bagaimana desa kami selalu berusaha memberikan yang terbaik untuk semua
                    warganya.
                </p>
            </div>
            <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Pelayanan Terbaik untuk Warga
                        </h3>
                        <p class="my-4">
                            "Desa Cidadap selalu memberikan pelayanan terbaik untuk warganya. Saya sangat bangga menjadi
                            bagian dari desa ini. Semua kebutuhan administratif saya selalu ditangani dengan cepat dan
                            profesional."
                        </p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>
                                Nurul Cahyani
                            </div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Warga Desa Cidadap
                            </div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Festival Budaya yang Mengesankan
                        </h3>
                        <p class="my-4">
                            "Festival budaya tahunan di desa kami sangat mengesankan dan mempererat tali
                            persaudaraan antarwarga. Setiap tahun, saya selalu menantikan acara ini karena membawa
                            kebahagiaan dan kebanggaan tersendiri."
                        </p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>
                                Siti Aminah
                            </div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Warga Desa Cidadap
                            </div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 lg:border-b-0 md:p-12 lg:border-r dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Produk Lokal Berkualitas
                        </h3>
                        <p class="my-4">
                            "Produk-produk lokal dari desa kami sangat berkualitas dan unik. Saya senang
                            bisa berbelanja di pasar desa dan mendukung ekonomi lokal. Setiap produk yang saya beli
                            selalu memuaskan."
                        </p>

                        undoubtedly level up your next application."</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>Andi Pratama</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Warga Desa Cidadap
                            </div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-gray-200 md:p-12 dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Pelatihan Pertanian yang Bermanfaat
                        </h3>
                        <p class="my-4">
                            "Program pelatihan pertanian modern yang diadakan oleh pemerintah desa sangat membantu saya
                            sebagai petani. Saya belajar banyak teknik baru yang meningkatkan hasil panen saya. Terima
                            kasih Desa Cidadap!""
                        </p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center space-x-3">
                        <img class="w-9 h-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                            alt="profile picture">
                        <div class="space-y-0.5 font-medium dark:text-white text-left">
                            <div>
                                Rina Wulandari
                            </div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Warga Desa Cidadap
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
    </section>
    {{-- TESTIMONIALS SECTION END --}}
</x-layout>
