@props([
    'type' => 'submit',
    'variant' => 'primary', // 'primary', 'secondary', 'outline', 'outline-primary', 'danger', 'dark'
    'size' => 'md', // 'sm', 'md', 'lg'
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded-xl transition duration-150 active:scale-95 cursor-pointer disabled:opacity-50 disabled:pointer-events-none';

    $sizeClasses = match($size) {
        'sm' => 'px-3.5 py-1.5 text-xs',
        'lg' => 'px-8 py-3 text-sm',
        default => 'px-5 py-2.5 text-xs sm:text-sm',
    };

    $variantClasses = match($variant) {
        'primary' => 'bg-[#0353a4] hover:bg-[#023e7d] text-white shadow-xs',
        'secondary' => 'bg-[#0466c8] hover:bg-[#0353a4] text-white shadow-xs',
        'outline' => 'border border-slate-300 hover:border-slate-400 text-slate-700 hover:bg-slate-50',
        'outline-primary' => 'border border-[#0353a4] text-[#0353a4] hover:bg-[#edf4fc]',
        'dark' => 'bg-[#001845] hover:bg-[#002855] text-white',
        'danger' => 'bg-rose-600 hover:bg-rose-700 text-white shadow-xs',
        default => 'bg-[#0353a4] hover:bg-[#023e7d] text-white',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses"]) }}>
        {{ $slot }}
    </button>
@endif
