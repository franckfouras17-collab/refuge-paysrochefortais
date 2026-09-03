@props(['label', 'ratio' => 'video', 'image' => null])
@php
  $ratios = ['video' => 'aspect-video', 'square' => 'aspect-square', 'portrait' => 'aspect-[3/4]'];
@endphp
@if ($image)
  <figure {{ $attributes->merge(['class' => "{$ratios[$ratio]} relative overflow-hidden rounded-2xl"]) }}>
    <img src="{{ $image }}" alt="{{ $label }}" class="h-full w-full object-cover" />
  </figure>
@else
  <figure {{ $attributes->merge(['class' => "{$ratios[$ratio]} relative overflow-hidden rounded-2xl border-2 border-dashed border-line bg-sand/60 flex flex-col items-center justify-center gap-3 text-center px-6"]) }}>
    <div class="absolute inset-0 opacity-[0.35]" aria-hidden="true">
      <svg viewBox="0 0 200 140" class="h-full w-full" preserveAspectRatio="xMidYMid slice">
        <circle cx="30" cy="115" r="55" fill="var(--color-marsh)" opacity="0.12" />
        <circle cx="175" cy="20" r="40" fill="var(--color-teal)" opacity="0.14" />
      </svg>
    </div>
    <span class="relative flex h-12 w-12 items-center justify-center rounded-full bg-paper text-marsh shadow-sm">
      <x-icon name="paw" class="w-5 h-5" />
    </span>
    <p class="relative text-sm font-medium text-ink/60 max-w-[22ch]">Photo à venir — {{ $label }}</p>
  </figure>
@endif
