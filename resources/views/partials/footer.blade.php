<footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
    @if ((auth()->check() && auth()->user()->isAdmin()) || request()->routeIs('dashboard.*'))
        @include('partials.admin_footer')
    @else
        @include('partials.public_footer')
    @endif
</footer>
