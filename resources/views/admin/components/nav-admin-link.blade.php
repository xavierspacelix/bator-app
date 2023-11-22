@props(['active', 'icon', 'href', 'svg'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center p-2 w-full text-base font-medium text-white rounded-lg transition duration-75 group bg-blue-800 hover:bg-blue-600 dark:text-white dark:hover:bg-gray-700'
            : 'flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="{{ $href }}">
    {!! $icon !!}
    {!! $slot !!}
</a>
