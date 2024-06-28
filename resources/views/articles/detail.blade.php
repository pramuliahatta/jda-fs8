<x-layout>
    <x-slot name="title">Artikel</x-slot>

    <div class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">

<<<<<<< HEAD
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <x-article :detail="$detail" />
=======
                <figure>
                    <img class="w-full h-96 rounded-lg object-cover" src="/{{ $detail['photo'] }}"
                        alt="road-construction">
                    <figcaption>Pembangunan Jalan Baru</figcaption>
                </figure>
                {!! $detail['body'] !!}
            </article>
>>>>>>> abbe477302085cdc29bdce392027f6f604e93c0d
        </div>
    </div>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-green-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Artikel Terkait</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
<<<<<<< HEAD
                @php
                    $count = 0;
                @endphp

                @foreach ($data as $article)
                    @php
                        $dom = new \DOMDocument();
                        @$dom->loadHTML($article['body']);

                        // Extract text content without tags
                        $textContent = strip_tags($dom->saveHTML($dom->documentElement));
                    @endphp
                    @if ($article['id'] != $detail['id'])
                        @if ($count < 4)
                            <article class="max-w-xs">
                                <a href="#">
                                    <img class="mb-5 h-44 w-full object-cover rounded-lg"src="/{{ $article['photo'] }}"
                                        alt="{{ $article['title'] }}">
                                </a>
                                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white truncate">
                                    <a href="#">{{ $article['title'] }}</a>
                                </h2>
                                <p class="mb-4 text-gray-700 dark:text-gray-400">

                                    {{ substr($textContent, 0, 50) }}...
                                </p>
                                <a href="{{ route('articles.detail', $article['id']) }}"
                                    class="inline-flex items-center font-medium underline underline-offset-4 text-green-500 dark:text-primary-500 hover:no-underline">
                                    Baca Selengkapnya
                                </a>
                            </article>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endif
                @endforeach
=======
                <article class="max-w-xs">
                    <a href="#">
                        <img class="mb-5 h-44 w-full object-cover rounded-lg"src="https://images.pexels.com/photos/2489/street-building-construction-industry.jpg?auto=compress&cs=tinysrgb&w=600"
                            alt="road-construction">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white truncate">
                        <a href="#">Pembangunan Jalan Desa Baru</a>
                    </h2>
                    <p class="mb-4 text-gray-700 dark:text-gray-400">
                        {{ substr(
                            'Proyek pembangunan jalan desa baru telah dimulai minggu ini. Jalan baru ini diharapkan akan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                meningkatkan aksesibilitas dan kenyamanan bagi warga desa, serta mempermudah transportasi hasil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                pertanian dan produk lokal.',
                            0,
                            50,
                        ) }}...
                    </p>
                    <a href="{{ route('articles.detail', 5) }}"
                        class="inline-flex items-center font-medium underline underline-offset-4 text-green-500 dark:text-primary-500 hover:no-underline">
                        Baca Selengkapnya
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img class="mb-5 h-44 w-full object-cover rounded-lg"
                            src="https://images.pexels.com/photos/713644/pexels-photo-713644.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="festivals">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white truncate">
                        <a href="#">Festival Budaya Tahunan</a>
                    </h2>
                    <p class="mb-4  text-gray-700 dark:text-gray-400">
                        {{ substr(
                            'Festival budaya tahunan Desa Cidadap akan diselenggarakan bulan depan. Acara ini akan menampilkan berbagai pertunjukan seni tradisional, pameran kerajinan tangan, dan bazar makanan khas daerah.',
                            0,
                            50,
                        ) }}...
                    </p>
                    <a href="{{ route('articles.detail', 6) }}"
                        class="inline-flex items-center font-medium underline underline-offset-4 text-green-500 dark:text-primary-500 hover:no-underline">
                        Baca Selengkapnya
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img class="mb-5 h-44 w-full object-cover rounded-lg"
                            src="https://images.pexels.com/photos/2131784/pexels-photo-2131784.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="rice-fields">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white truncate">
                        <a href="#"> Gotong Royong Desa</a>
                    </h2>
                    <p class="mb-4  text-gray-700 dark:text-gray-400">
                        {{ substr(
                            'Ayo bersama-sama membersihkan lingkungan desa dalam kegiatan gotong royong. Ini adalah kesempatan untuk mempererat silaturahmi dan menjaga kebersihan desa kita.',
                            0,
                            50,
                        ) }}...
                    </p>
                    <a href="{{ route('articles.detail', 7) }}"
                        class="inline-flex items-center font-medium underline underline-offset-4 text-green-500 dark:text-primary-500 hover:no-underline">
                        Baca Selengkapnya
                    </a>
                </article>
                <article class="max-w-xs">
                    <a href="#">
                        <img class="mb-5 h-44 w-full object-cover rounded-lg"
                            src="https://images.pexels.com/photos/10333242/pexels-photo-10333242.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="cooking-festivals">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white truncate">
                        <a href="#">Lomba Memasak Tradisional</a>
                    </h2>
                    <p class="mb-4  text-gray-700 dark:text-gray-400">
                        {{ substr(
                            'Ikuti lomba memasak dengan resep-resep tradisional
                                                                                                                                                                                                                                                                                                                        Desa Cidadap. Acara ini terbuka untuk semua warga desa dan pemenang akan mendapatkan hadiah
                                                                                                                                                                                                                                                                                                                        menarik.',
                            0,
                            50,
                        ) }}...
                    </p>
                    <a href="{{ route('articles.detail', 8) }}"
                        class="inline-flex items-center font-medium underline underline-offset-4 text-green-500 dark:text-primary-500 hover:no-underline">
                        Baca Selengkapnya
                    </a>
                </article>
>>>>>>> abbe477302085cdc29bdce392027f6f604e93c0d
            </div>
        </div>
    </aside>
</x-layout>
