@props(['href', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => $active ? 'block py-2 pr-4 pl-3 text-white rounded bg-green-500 lg:bg-transparent lg:text-green-500 lg:p-0 dark:text-white' : 'block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-green-500 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700']) }}
        aria-current="{{ $active ? 'page' : '' }}">
        {{ $slot }}
    </a>
</li>
