@php
    use Carbon\Carbon;

    $dom = new \DOMDocument();
    @$dom->loadHTML($data['body']);

    $paragraphs = $dom->getElementsByTagName('p');

    if ($paragraphs->length > 0) {
        $leadParagraph = $paragraphs->item(0);
        $leadParagraph->setAttribute('class', 'lead text-gray-700"');
        $leadParagraphHtml = $dom->saveHTML($leadParagraph);
        $leadParagraph->parentNode->removeChild($leadParagraph);
    }

    $restOfContent = $dom->saveHTML($dom->getElementsByTagName('body')->item(0));

    $createdDate = $data['created_at'];
    $updatedDate = $data['updated_at'];

    $displayDate = $updatedDate ?: $createdDate;

    // Set Carbon locale to Indonesian
    Carbon::setLocale('id');

    // Ensure $displayDate is a Carbon instance
    if (!($displayDate instanceof Carbon)) {
        $displayDate = Carbon::parse($displayDate);
    }

    // Format date to "27 Juni 2024"
    $formattedDate = $displayDate->translatedFormat('d F Y');
@endphp

<x-layout>
    <x-slot name="title">Artikel</x-slot>


    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">


        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">
                                    Admin
                                </a>
                                <p class="text-base text-gray-700 dark:text-gray-400">
                                    Pemerintah Desa Cidadap
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-400">
                                    <time pubdate datetime="{{ $formattedDate }}" title="J{{ $formattedDate }}">
                                        {{ $formattedDate }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $data['title'] }}
                    </h1>
                </header>

                {!! $leadParagraphHtml !!}

                <figure>
                    <img class="w-full h-96 rounded-lg object-cover" src="/{{ $data['photo'] }}"
                        alt="road-construction">
                    <figcaption>{{ $data['title'] }}</figcaption>
                </figure>
                {!! $restOfContent !!}
            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-green-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Artikel Terkait</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
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
            </div>
        </div>
    </aside>
</x-layout>
