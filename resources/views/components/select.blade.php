@props([
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'theme' => 'light', // 'light' or 'dark'
    'placeholder' => null,
    'value' => null,
    'size' => 'md',
])

@php
    $id = $id ?? $name;
    $isDark = $theme === 'dark';

    $baseClasses = 'appearance-none w-full pl-3.5 pr-10 rounded-xl text-xs outline-none transition cursor-pointer';

    $sizeClasses = match($size) {
        'sm' => 'py-1.5 text-xs',
        'lg' => 'py-3 text-sm',
        default => 'py-2.5 text-xs',
    };

    $themeClasses = $isDark
        ? 'bg-[#002855] border border-[#023e7d] text-white focus:ring-1 focus:ring-[#0466c8]'
        : 'bg-white border border-slate-300 text-slate-800 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4]';

    $chevronColor = $isDark ? 'text-slate-300' : 'text-slate-400';
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'w-full']) }}>
    @if($label)
        <label for="{{ $id }}" class="block text-xs font-semibold mb-1.5 {{ $isDark ? 'text-slate-300' : 'text-slate-700' }}">
            {{ $label }}
            @if($required)
                <span class="text-rose-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select
            name="{{ $name }}"
            id="{{ $id }}"
            @if($required) required @endif
            {{ $attributes->except('class')->merge(['class' => "$baseClasses $sizeClasses $themeClasses"]) }}
        >
            @if($placeholder)
                <option value="" {{ empty($value) ? 'selected' : '' }} class="{{ $isDark ? 'bg-[#001845] text-slate-400' : 'text-slate-400' }}">{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>

        {{-- Chevron arrow with comfortable right padding (pr-3.5) --}}
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 {{ $chevronColor }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>

    @if(isset($errors) && $errors->has($name))
        <p class="mt-1 text-[11px] text-rose-500">{{ $errors->first($name) }}</p>
    @endif
</div>
