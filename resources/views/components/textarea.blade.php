@props([
    'name',
    'id' => null,
    'label' => null,
    'required' => false,
    'theme' => 'light',
    'rows' => 3,
    'placeholder' => null,
    'value' => null,
])

@php
    $id = $id ?? $name;
    $isDark = $theme === 'dark';

    $baseClasses = 'w-full px-3.5 py-2.5 rounded-xl text-xs outline-none transition';
    $themeClasses = $isDark
        ? 'bg-[#002855] border border-[#023e7d] text-white placeholder-slate-400 focus:ring-1 focus:ring-[#0466c8]'
        : 'bg-white border border-slate-300 text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0353a4] focus:border-[#0353a4]';
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

    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        rows="{{ $rows }}"
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required @endif
        {{ $attributes->except('class')->merge(['class' => "$baseClasses $themeClasses"]) }}
    >{{ $value ?? old($name) }}</textarea>

    @if(isset($errors) && $errors->has($name))
        <p class="mt-1 text-[11px] text-rose-500">{{ $errors->first($name) }}</p>
    @endif
</div>
