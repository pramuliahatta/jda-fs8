@php
    use Carbon\Carbon;

    $dom = new \DOMDocument();
    @$dom->loadHTML($detail['body']);

    $paragraphs = $dom->getElementsByTagName('p');

    if ($paragraphs->length > 0) {
        $leadParagraph = $paragraphs->item(0);
        $leadParagraph->setAttribute('class', 'lead text-gray-700"');
        $leadParagraphHtml = $dom->saveHTML($leadParagraph);
        $leadParagraph->parentNode->removeChild($leadParagraph);
    }

    $restOfContent = $dom->saveHTML($dom->getElementsByTagName('body')->item(0));

    $createdDate = $detail['created_at'];
    $updatedDate = $detail['updated_at'];

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
                        {{ $detail['title'] }}
                    </h1>
                </header>

                {!! $leadParagraphHtml !!}

                <figure>
                    <img class="w-full h-96 rounded-lg object-cover" src="/{{ $detail['photo'] }}"
                        alt="road-construction">
                    <figcaption>{{ $detail['title'] }}</figcaption>
                </figure>
                {!! $restOfContent !!}
            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-green-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Artikel Terkait</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $count = 0;
                @endphp

                @foreach ($data as $article)
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

                                    {!! substr($article['body'], 0, 50) !!}...
                                </p>
                                <a href="{{ route('articles.detail', 5) }}"
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
            </div>
        </div>
    </aside>
</x-layout>
