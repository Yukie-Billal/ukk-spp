@props(['color' => 'primary','modal' => false, 'target' => '',])

@php
    $modalSet;
    $modal ? $modalSet = "data-bs-toggle=modal data-bs-target=$target" : '';
@endphp

<button {{ $attributes->merge(['class' => "button button-$color py-1"]) }} {{ $modal ? $modalSet : '' }}>{{ $slot }}</button>