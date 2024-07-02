@php
    $categoryClass = $detail['category'] == 'Acara' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600';
@endphp

<article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
    <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 bg-green-400 rounded-full"
                    src="{{ asset('img/static/Lambang_Kabupaten_Majalengka.svg') }}" alt="profile-photo">
                <div>
                    <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Admin</a>
                    <p class="text-base text-gray-500 dark:text-gray-400">Pemerintah Desa Cidadap</p>
                    <p class="text-base text-gray-500 dark:text-gray-400">
                        <time pubdate datetime="{{ $formattedDate }}" title="{{ $formattedDate }}">
                            {{ $formattedDate }}
                        </time>
                    </p>
                </div>
            </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {{ $detail['title'] }}
        </h1>
        <span
            class="
                        {{ $categoryClass }}
                          text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                </path>
            </svg>
            {{ $detail['category'] }}
        </span>
    </header>

    {!! $leadParagraphHtml !!}

    <figure>
        <img class="w-full h-96 rounded-lg object-cover" src="/{{ $detail['photo'] }}" alt="road-construction">
        <figcaption>{{ $detail['title'] }}</figcaption>
    </figure>

    {!! $restOfContent !!}
</article>
