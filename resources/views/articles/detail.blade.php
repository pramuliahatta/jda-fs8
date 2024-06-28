<x-layout>
    <x-slot name="title">Artikel</x-slot>

    <div class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">

        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <x-article :detail="$detail" />
        </div>
    </div>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-green-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Artikel Terkait</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $count = 0;
                @endphp

                @foreach ($data as $article)
                    @if ($article['id'] != $detail['id'])
                        @php
                            $dom = new \DOMDocument();
                            @$dom->loadHTML($article['body']);

                            // Extract text content without tags
                            $textContent = strip_tags($dom->saveHTML($dom->documentElement));
                        @endphp

                        @if ($count < 4)
                            <article class="max-w-xs">
                                <a href="#">
                                    <img class="mb-5 h-44 w-full object-cover rounded-lg" src="/{{ $article['photo'] }}"
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
            </div>

        </div>
    </aside>
</x-layout>
