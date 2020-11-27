@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900'
            : 'px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
