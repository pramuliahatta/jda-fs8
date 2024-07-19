<x-layout>
    {{-- {{ dd($dataAcara, $dataBerita, $dataGallery) }} --}}
    <x-slot name="title">Beranda</x-slot>
    {{-- HERO SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Selamat Datang
                    <br />
                    di <span class="text-green-500">Desa Cidadap</span>
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Desa tertua di Kecamatan Cingambul yang kaya akan sejarah dan budaya. Jelajahi pesona alam dan
                    kehidupan masyarakat kami yang harmonis. Temukan lebih lanjut tentang keunikan desa kami.
                </p>
                <a href="{{ route('about') }}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 dark:focus:ring-primary-900">
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
                <img class="rounded-lg w-full h-96 object-cover" src="{{ asset('img/static/hero.jpg') }}"
                    alt="mockup">
            </div>
        </div>
    </section>
    {{-- HERO SECTION END --}}

    {{-- STATISTICS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="bg-green-50 rounded-lg max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">2.785+</dt>
                    <dd class="font-light text-gray-700 dark:text-gray-400">jumlah penduduk</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">274.548,5 Ha</dt>
                    <dd class="font-light text-gray-700 dark:text-gray-400">luas wilayah</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">826</dt>
                    <dd class="font-light text-gray-700 dark:text-gray-400">jumlah KK</dd>
                </div>
            </dl>
        </div>
    </section>
    {{-- STATISTICS SECTION END --}}

    {{-- PUBLIC SERVICES SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full h-96 object-cover dark:hidden rounded-lg" src="{{ asset('img/static/civils.jpg') }}"
                alt="civils-service">
            <img class="w-full h-96 object-cover hidden dark:block rounded-lg"
                src="{{ asset('img/static/civils.jpg') }}" alt="civils-service">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Layanan Masyarakat
                </h2>
                <p class="mb-6 font-light text-gray-700 md:text-lg dark:text-gray-400">
                    Kami menyediakan berbagai layanan untuk memenuhi kebutuhan masyarakat Desa Cidadap. Unduh formulir
                    yang diperlukan dan datang langsung ke kantor desa.
                </p>
                <a href="{{ route('services') }}"
                    class="inline-flex items-center text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
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

    {{-- SOCIAL SERVICES SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Puskesos: Layanan Sosial
                </h2>
                <p class="mb-6 font-light text-gray-700 md:text-lg dark:text-gray-400">
                    Melalui Puskesos (Pusat Kesejahteraan Sosial) Pemerintah Desa Cidadap berkomitmen untuk memberikan
                    berbagai layanan sosial yang bertujuan
                    meningkatkan kesejahteraan dan kualitas hidup masyarakat.
                </p>
                <a href="{{ route('puskesos') }}"
                    class="inline-flex items-center text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 mb-6">
                    Pelajari Lebih Lanjut
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <img class="w-full h-96 object-cover dark:hidden rounded-lg" src="{{ asset('img/static/socials.jpg') }}"
                alt="socials-service">
            <img class="w-full h-96 object-cover hidden dark:block rounded-lg"
                src="{{ asset('img/static/socials.jpg') }}" alt="socials-service">
        </div>
    </section>
    {{-- SOCIAL SERVICES SECTION END --}}

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
            <div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
                @foreach ($dataBerita as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
            <div class="flex justify-end my-8">
                <a href="{{ route('articles') }}"
                    class="inline-flex items-center text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                    Lihat Semua Berita
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
    {{-- NEWS SECTION END --}}

    {{-- NEXT EVENT SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 bg-green-50 rounded-lg mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Acara Mendatang
                </h2>
                <p class="font-light text-gray-700 sm:text-xl dark:text-gray-400">
                    Jangan lewatkan berbagai acara menarik yang akan berlangsung di Desa Cidadap. Bergabunglah dalam
                    kegiatan-kegiatan kami dan rasakan kebersamaan serta kekayaan budaya desa.
                </p>
            </div>
            <div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
                @foreach ($dataAcara as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
            <div class="flex justify-end my-8">
                <a href="{{ route('articles') }}"
                    class="inline-flex items-center text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                    Lihat Semua Acara
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
    {{-- NEXT EVENT SECTION END --}}


    {{-- MARKETPLACE SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-700 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Pasar Desa
                </h2>
                <p class="mb-4">
                    Temukan berbagai produk lokal berkualitas dari kerajinan tangan, makanan khas, hingga pakaian
                    tradisional yang dibuat oleh warga desa. Dukung ekonomi lokal dengan berbelanja di sini.
                </p>

                <a href="{{ route('products') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-200 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-600">
                    Kunjungi Sekarang
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full h-96 object-cover rounded-lg" src="{{ asset('img/static/produk1.jpeg') }}"
                    alt="jangkir">
                <img class="mt-4 w-full h-96 object-cover lg:mt-10 rounded-lg"
                    src="{{ asset('img/static/produk2.jpeg') }}" alt="rengginang">
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
                <p class="font-light text-gray-700 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Lihatlah keindahan dan kehidupan sehari-hari di Desa Cidadap melalui galeri foto kami.
                </p>
            </div>
            <div class="grid gap-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($dataGallery as $gallery)
                        <div>
                            <img class="h-64 w-full object-cover rounded-lg" src="{{ asset($gallery['photo']) }}"
                                alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end my-8">
                <a href="{{ route('gallery') }}"
                    class="inline-flex items-center text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                    Lihat Semua Galeri
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
    {{-- GALLERY SECTION END --}}

    {{-- TESTIMONIALS SECTION --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 bg-green-50 rounded-lg px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Ada Pertanyaan? Hubungi Kami!
                </h2>
                <p class="mb-8 font-light text-gray-700 lg:mb-16 sm:text-xl dark:text-gray-400">
                    Butuh informasi lebih lanjut, punya saran, atau ingin bertanya sesuatu? Kami siap membantu Anda!
                    Hubungi kami melalui telepon, email, atau kunjungi kantor kami langsung. Mari bersama-sama membangun
                    Desa Cidadap yang lebih baik!
                </p>
            </div>
            <div class="justify-center">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-200 dark:focus:ring-primary-900">
                    Kontak Kami
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
    </section>
    {{-- TESTIMONIALS SECTION END --}}
</x-layout>
