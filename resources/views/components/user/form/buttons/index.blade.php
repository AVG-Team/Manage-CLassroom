@props(['style' => 'primary'])

@php
    $baseClasses = 'text-sm text-center rounded-full hover:shadow-md hover:shadow-[#0c66ee]/50 transition duration-300';
    $styles = [
        'primary' => 'bg-gradient-to-r from-[#468ef9] to-[#0c66ee] border border-[#0c66ee] text-white',
        'secondary' => 'bg-inherit text-gradient border border-[#0c66ee]',
    ];
    $styleClass = $styles[$style] ?? '';
@endphp

<button {{ $attributes->merge(['class' => "$baseClasses $styleClass", 'type' => 'button']) }}>
    {{ $slot }}
</button>