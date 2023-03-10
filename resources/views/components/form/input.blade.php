@props(['type' => 'text'])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'input-form text-m-medium placeholder-m-m']) }}>