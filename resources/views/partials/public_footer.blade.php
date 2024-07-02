<div class="mx-auto max-w-screen-xl text-center">
    <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
        <img src="{{ asset('img/static/Lambang_Kabupaten_Majalengka.svg') }}" class="mr-3 h-12" alt="logo" />
        <span class="self-center text-left text-xs font-semibold whitespace-nowrap dark:text-white">
            PEMERINTAH KABUPATEN MAJALENGKA
            <br />
            KECAMATAN CINGAMBUL
            <br />
            DESA CIDADAP
        </span>
    </a>
    <p class="my-6 text-gray-500 dark:text-gray-400">
        Jl. Desa Cidadap No. 1 Desa Cidadap, Kecamatan Cingambul, Kabupaten Majalengka, Provinsi Jawa Barat, Kode
        Pos 45467
    </p>
    <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
        <li>
            <a href="{{ route('about') }}" class="mr-4 hover:underline md:mr-6 ">Tentang Kami</a>
        </li>
        <li>
            <a href="{{ route('gallery') }}" class="mr-4 hover:underline md:mr-6">Galeri</a>
        </li>
        <li>
            <a href="{{ route('articles') }}" class="mr-4 hover:underline md:mr-6">Artikel</a>
        </li>
        <li>
            <a href="{{ route('products') }}" class="mr-4 hover:underline md:mr-6">Pasar Desa</a>
        </li>
        <li>
            <a href="{{ route('contact') }}" class="mr-4 hover:underline md:mr-6">Kontak Kami</a>
        </li>

    </ul>
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a href="#"
            class="hover:underline">Desa Cidadap</a>. All Rights Reserved.</span>
</div>
