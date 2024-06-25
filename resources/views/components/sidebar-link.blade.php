@props(['href', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'flex items-center p-2 text-base font-medium rounded-lg group' . ($active ? ' text-green-500 bg-gray-100 dark:bg-gray-700 dark:text-white' : ' text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white')]) }}>
        {{ $slot }}
    </a>
</li>
