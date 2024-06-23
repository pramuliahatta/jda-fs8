<section class="p-4 md:ml-64 h-auto pt-20 antialiased">
    <div class="relative w-full min-h-full">
        <!-- Modal content -->
        @if (request()->routeIs($route))
            <div class="bg-white rounded-lg shadow dark:bg-gray-800">
                {{ $slot }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <x-icon-link route="{{ $route }}" text="Kembali" />
                {{ $slot }}
            </div>
        @endif

    </div>
</section>
