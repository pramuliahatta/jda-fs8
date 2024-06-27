<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Title' }} - Pemerintah Desa Cidadap</title>
    <link rel="icon" type="image/svg+xml"
        href="https://upload.wikimedia.org/wikipedia/commons/f/f0/Lambang_Kabupaten_Majalengka.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    @unless (request()->routeIs('login'))
        @include('partials.header')
    @endunless

    <main>
        <div id="alert-message" class="w-full flex justify-center">
            @if (session('success'))
                <div class="p-4 mt-8 w-4/4 top-0 z-50 fixed text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">Berhasil!</span>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div id="alert-message"
                    class="p-4 mt-8 w-4/4 top-0 z-50 fixed text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Upps!</span>
                    {{ session('error') }}
                </div>
            @endif
        </div>

        {{ $slot }}
    </main>

    @unless (request()->routeIs('login'))
        <footer>
            @include('partials.footer')
        </footer>
    @endunless

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const alertMessage = document.getElementById('alert-message');

            if (alertMessage) {
                const messageType = alertMessage.getAttribute('data-type');
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>

</html>
