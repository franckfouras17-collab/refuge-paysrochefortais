@props(['variant' => 'a'])
@if ($variant === 'a')
  <svg {{ $attributes }} viewBox="0 0 600 200" fill="none" preserveAspectRatio="none" aria-hidden="true">
    <path d="M0 120 C 120 60, 220 180, 340 110 S 560 40, 600 90 V200 H0 Z" fill="var(--color-sand)" />
    <path d="M0 150 C 140 100, 260 200, 400 140 S 560 90, 600 130" stroke="var(--color-teal)" stroke-width="2" opacity="0.5" />
  </svg>
@else
  <svg {{ $attributes }} viewBox="0 0 600 200" fill="none" preserveAspectRatio="none" aria-hidden="true">
    <path d="M0 90 C 100 150, 220 20, 340 80 S 520 160, 600 100 V0 H0 Z" fill="var(--color-marsh)" opacity="0.08" />
  </svg>
@endif
