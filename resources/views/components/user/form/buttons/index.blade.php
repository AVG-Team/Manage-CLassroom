@props(['style' => 'primary'])

@php
    $baseClasses = 'text-sm text-center rounded-full hover:shadow-md transition duration-300';
    $styles = [
        'primary' => 'bg-gradient-to-r from-[#468ef9] to-[#0c66ee] border border-[#0c66ee] text-primary hover:shadow-[#0c66ee]/50 ',
        'secondary' => 'bg-inherit text-gradient border border-[#0c66ee]',
        'danger' => 'bg-gradient-to-r from-[#f87171] to-[#c65a5a] border border-[#df6565] hover:shadow-[#df6565]/50 text-white',
    ];
    $styleClass = $styles[$style] ?? '';
@endphp

<button {{ $attributes->merge(['class' => "$baseClasses $styleClass", 'type' => 'button']) }}>
    {{ $slot }}
</button>
