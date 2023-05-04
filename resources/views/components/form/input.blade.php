@props(['type' => 'text', 'load' => true])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'input-form text-m-medium placeholder-m-m']) }} {{ $load ? "wire:loading.attr='readonly'" : "" }}>