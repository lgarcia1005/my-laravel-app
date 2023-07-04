@props(['active' => false])

@php

    $class = "flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-blue-500 hover:text-white disabled:text-gray-500";

    if( $active ){
      $class .= " bg-blue-500 text-white";
    }

@endphp

<a {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</a>
