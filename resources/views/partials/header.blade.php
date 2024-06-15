<header class="absolute w-full">
    @if (auth()->check() && auth()->user()->isAdmin())
        @include('partials.admin_nav')
    @else
        @include('partials.public_nav')
    @endif
</header>
