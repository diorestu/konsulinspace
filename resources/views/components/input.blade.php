@props([
    'type' => 'text',
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'theme' => 'light', // 'light' or 'dark'
    'placeholder' => null,
    'value' => null,
    'whiteDateIcon' => null,
    'prefix' => null,
    'size' => 'md',
])

@php
    $id = $id ?? $name;
    $isDark = $theme === 'dark';

    // Auto-enable white date icon if dark theme or explicitly specified
    $useWhiteDateIcon = $whiteDateIcon ?? ($type === 'date' && $isDark);

    $baseClasses = 'w-full rounded-xl text-xs outline-none transition';

    $sizeClasses = match($size) {
        'sm' => 'py-1.5 px-3 text-xs',
        'lg' => 'py-3 px-4 text-sm',
        default => 'py-2.5 px-3.5 text-xs',
    };

    if ($prefix) {
        $sizeClasses .= ' pl-10';
    }

    $themeClasses = $isDark
        ? 'bg-[#002855] border border-[#023e7d] text-white placeholder-slate-400 focus:ring-1 focus:ring-[#0466c8]'
        : 'bg-white border border-slate-300 text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4]';

    $dateClasses = '';
    if ($type === 'date') {
        if ($useWhiteDateIcon) {
            $dateClasses = 'date-white-icon [color-scheme:dark] [&::-webkit-calendar-picker-indicator]:invert [&::-webkit-calendar-picker-indicator]:cursor-pointer [&::-webkit-calendar-picker-indicator]:opacity-90 hover:[&::-webkit-calendar-picker-indicator]:opacity-100 pr-3';
        } else {
            $dateClasses = 'cursor-pointer pr-3';
        }
    }
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
        @if($prefix)
            <span class="absolute left-3.5 inset-y-0 flex items-center text-xs font-bold {{ $isDark ? 'text-slate-400' : 'text-slate-400' }}">
                {{ $prefix }}
            </span>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value ?? old($name) }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            {{ $attributes->except('class')->merge(['class' => "$baseClasses $sizeClasses $themeClasses $dateClasses"]) }}
        >
    </div>

    @if(isset($errors) && $errors->has($name))
        <p class="mt-1 text-[11px] text-rose-500">{{ $errors->first($name) }}</p>
    @endif
</div>
