<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Title' }} - Pemerintah Desa Cidadap</title>
    <link rel="icon" type="image/svg+xml"
        href="https://upload.wikimedia.org/wikipedia/commons/f/f0/Lambang_Kabupaten_Majalengka.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @unless (request()->routeIs('login'))
        @include('partials.header')
    @endunless

    <main>
        {{ $slot }}
    </main>

    @unless (request()->routeIs('login'))
        <footer>
            @include('partials.footer')
        </footer>
    @endunless
</body>

</html>
