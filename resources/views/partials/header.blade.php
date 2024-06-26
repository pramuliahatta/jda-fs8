<header>
    @if (request()->routeIs('dashboard.*'))
        @include('partials.admin_nav')
    @else
        @include('partials.public_nav')
    @endif
</header>
