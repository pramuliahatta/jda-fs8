<!-- resources/views/components/article.blade.php -->
<article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
    <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                <img class="mr-4 w-16 h-16 rounded-full"
                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
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
    </header>

    {!! $leadParagraphHtml !!}

    <figure>
        <img class="w-full h-96 rounded-lg object-cover" src="/{{ $detail['photo'] }}" alt="road-construction">
        <figcaption>{{ $detail['title'] }}</figcaption>
    </figure>

    {!! $restOfContent !!}
</article>
