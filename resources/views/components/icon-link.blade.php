<div class="flex justify-start">
    <a href="{{ route($route) }}" type="button"
        class="flex gap-1 items-center text-sm text-gray-500 hover:text-blue-500 mb-8 uppercase">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                d="m15 19-7-7 7-7" />
        </svg>
        <span class="all-caps">{{ $text }}</span>
    </a>
</div>
