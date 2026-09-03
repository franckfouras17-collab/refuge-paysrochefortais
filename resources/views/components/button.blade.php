@props(['href', 'variant' => 'primary', 'icon' => true])
@php
  $base = 'group inline-flex items-center gap-2 rounded-full px-6 py-3.5 font-semibold tracking-tight transition-all duration-200 focus-visible:outline-offset-4';
  $variants = [
    'primary' => 'bg-wood text-paper hover:bg-[#96603d] shadow-[0_4px_0_0_rgba(43,58,64,0.18)] hover:shadow-[0_2px_0_0_rgba(43,58,64,0.18)] hover:translate-y-[2px] active:translate-y-[4px] active:shadow-none',
    'secondary' => 'bg-marsh text-paper hover:bg-[#3d5960] shadow-[0_4px_0_0_rgba(43,58,64,0.18)] hover:shadow-[0_2px_0_0_rgba(43,58,64,0.18)] hover:translate-y-[2px] active:translate-y-[4px] active:shadow-none',
    'ghost' => 'bg-transparent text-ink border-2 border-line hover:border-marsh hover:text-marsh',
  ];
@endphp
<a href="{{ $href }}" {{ $attributes->merge(['class' => "{$base} {$variants[$variant]}"]) }}>
  <span>{{ $slot }}</span>
  @if ($icon)
    <x-icon name="arrow-right" class="w-4 h-4 shrink-0 transition-transform duration-200 group-hover:translate-x-0.5" />
  @endif
</a>
