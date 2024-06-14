<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Application' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        @include('partials.header')
    </header>

    <main>
        {{ $slot }}
    </main>
    
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
