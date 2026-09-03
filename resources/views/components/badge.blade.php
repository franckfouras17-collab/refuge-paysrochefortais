@props(['tone' => 'outline'])
@php
  $tones = [
    'teal' => 'bg-teal/15 text-[#3f6a70] ring-1 ring-teal/40',
    'marsh' => 'bg-marsh/12 text-marsh ring-1 ring-marsh/35',
    'wood' => 'bg-wood/12 text-[#7c5334] ring-1 ring-wood/40',
    'outline' => 'bg-transparent text-ink/70 ring-1 ring-line',
  ];
@endphp
<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 rounded-full px-3.5 py-1.5 text-sm font-semibold {$tones[$tone]}"]) }}>
  {{ $slot }}
</span>
