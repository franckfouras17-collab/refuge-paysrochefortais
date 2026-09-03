@props(['name', 'class' => 'w-6 h-6', 'label' => null])
@php $isDecorative = ! $label; @endphp
<svg
  xmlns="http://www.w3.org/2000/svg"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="1.6"
  stroke-linecap="round"
  stroke-linejoin="round"
  class="{{ $class }}"
  role="{{ $isDecorative ? 'presentation' : 'img' }}"
  @if ($isDecorative) aria-hidden="true" @endif
  @if ($label) aria-label="{{ $label }}" @endif
>
  @switch($name)
    @case('paw')
      <ellipse cx="12" cy="15.2" rx="4.4" ry="3.6" />
      <ellipse cx="6.4" cy="10.6" rx="1.8" ry="2.3" transform="rotate(-18 6.4 10.6)" />
      <ellipse cx="10.4" cy="7.4" rx="1.8" ry="2.4" transform="rotate(-6 10.4 7.4)" />
      <ellipse cx="14.4" cy="7.2" rx="1.8" ry="2.4" transform="rotate(6 14.4 7.2)" />
      <ellipse cx="18.1" cy="10.2" rx="1.8" ry="2.3" transform="rotate(18 18.1 10.2)" />
      @break
    @case('house')
      <path d="M4 11.5 12 4l8 7.5" />
      <path d="M6 10v9.5a.5.5 0 0 0 .5.5H10v-5.5a2 2 0 0 1 4 0V20h3.5a.5.5 0 0 0 .5-.5V10" />
      @break
    @case('kennel')
      <path d="M3.5 20V11L12 4.5 20.5 11v9" />
      <path d="M9 20v-6a3 3 0 0 1 6 0v6" />
      <path d="M3.5 20h17" />
      @break
    @case('fence')
      <path d="M5 5v15M9.5 3v17M14.5 3v17M19 5v15" />
      <path d="M3.5 9.5h17M3.5 15h17" />
      @break
    @case('leaf')
      <path d="M6 19c-1-6 1.5-12.5 12-14.5C19.3 15 12.8 19 6 19Z" />
      <path d="M6.5 18.5C10 14 13.5 10.5 17.5 5" />
      @break
    @case('seedling')
      <path d="M12 21v-8" />
      <path d="M12 13c0-4.5-3-6.5-7-6.5C5 10.8 7.5 13 12 13Z" />
      <path d="M12 13c0-3.7 2.4-5.3 5.7-5.3C17.7 11.2 15.7 13 12 13Z" />
      @break
    @case('mail')
      <rect x="3.5" y="5.5" width="17" height="13" rx="2" />
      <path d="m4.5 7 7.5 6 7.5-6" />
      @break
    @case('phone')
      <path d="M7.5 3.5 10 6l-1.7 2.6a11.5 11.5 0 0 0 5.1 5.1L15 12l2.5 2.5-.3 2.4a2 2 0 0 1-2.2 1.7A15 15 0 0 1 3.4 6.2a2 2 0 0 1 1.7-2.2Z" />
      @break
    @case('map-pin')
      <path d="M12 21s7-6.2 7-11.5a7 7 0 0 0-14 0C5 14.8 12 21 12 21Z" />
      <circle cx="12" cy="9.5" r="2.4" />
      @break
    @case('users')
      <circle cx="8.5" cy="8" r="2.7" />
      <circle cx="16.2" cy="9" r="2.2" />
      <path d="M3.5 19c.6-3.3 2.6-5 5-5s4.4 1.7 5 5" />
      <path d="M14.5 14.3c2 .2 3.5 1.8 4 4.7" />
      @break
    @case('coin')
      <circle cx="12" cy="12" r="8.25" />
      <path d="M9.7 9.6c.3-1 1.2-1.6 2.3-1.6 1.5 0 2.5.9 2.5 2s-1 1.6-2.5 2-2.5.9-2.5 2 1 2 2.5 2c1.1 0 2-.6 2.3-1.6" />
      <path d="M12 6.7v10.6" />
      @break
    @case('calendar')
      <rect x="3.5" y="5" width="17" height="15.5" rx="2" />
      <path d="M3.5 9.5h17M8 3v4M16 3v4" />
      @break
    @case('check-circle')
      <circle cx="12" cy="12" r="8.25" />
      <path d="m8.3 12.3 2.5 2.5 5-5.2" />
      @break
    @case('arrow-right')
      <path d="M4.5 12h15M13.5 6l6 6-6 6" />
      @break
    @case('menu')
      <path d="M4 6.5h16M4 12h16M4 17.5h16" />
      @break
    @case('close')
      <path d="M5.5 5.5l13 13M18.5 5.5l-13 13" />
      @break
    @case('chevron-down')
      <path d="M5.5 8.5 12 15l6.5-6.5" />
      @break
    @case('shield')
      <path d="M12 3.5 19 6.3v5.4c0 4.7-3 7.7-7 9-4-1.3-7-4.3-7-9V6.3Z" />
      <path d="m9 12 2.2 2.2L15.5 10" />
      @break
    @case('clipboard')
      <rect x="5.5" y="4.5" width="13" height="16" rx="2" />
      <rect x="9" y="3" width="6" height="3" rx="1" />
      <path d="M8.5 11h7M8.5 14.5h7M8.5 18h4.5" />
      @break
    @case('heart')
      <path d="M12 20S3.8 14.9 3.8 9.1a4.6 4.6 0 0 1 8.2-2.9 4.6 4.6 0 0 1 8.2 2.9C20.2 14.9 12 20 12 20Z" />
      @break
    @case('hand-heart')
      <path d="M3.5 13.5 7 12l4.3 1.2c1 .3 1 1.7 0 1.9l-4 .6-3.8-1" />
      <path d="M7 12V6.5" />
      <path d="M16.3 9.8c-2-1.3-4.5.6-2.3 2.7l2.3 2.2 2.3-2.2c2.2-2.1-.3-4-2.3-2.7Z" />
      @break
    @case('compass')
      <circle cx="12" cy="12" r="8.25" />
      <path d="m14.5 9.5-1.2 3.8-3.8 1.2 1.2-3.8 3.8-1.2Z" />
      @break
    @case('clock')
      <circle cx="12" cy="12" r="8.25" />
      <path d="M12 7.5V12l3 2" />
      @break
    @case('lock')
      <rect x="5" y="10.5" width="14" height="9.5" rx="2" />
      <path d="M8 10.5V7.5a4 4 0 0 1 8 0v3" />
      @break
  @endswitch
</svg>
