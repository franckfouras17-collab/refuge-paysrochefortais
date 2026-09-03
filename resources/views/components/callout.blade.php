@props(['tone' => 'info'])
@php
  $tones = [
    'info' => ['wrap' => 'bg-marsh/8 border-marsh/25', 'icon' => 'text-marsh', 'name' => 'compass'],
    'warning' => ['wrap' => 'bg-wood/10 border-wood/30', 'icon' => 'text-wood', 'name' => 'shield'],
    'note' => ['wrap' => 'bg-sand border-line', 'icon' => 'text-ink/60', 'name' => 'clipboard'],
  ];
  $t = $tones[$tone];
@endphp
<div {{ $attributes->merge(['class' => "flex gap-4 rounded-xl border p-5 sm:p-6 {$t['wrap']}"]) }}>
  <x-icon :name="$t['name']" class="{{ 'w-5 h-5 shrink-0 mt-0.5 ' . $t['icon'] }}" />
  <div class="text-[0.975rem] leading-relaxed text-ink/85 [&_strong]:text-ink [&_a]:underline [&_a]:decoration-wood/50 [&_a]:underline-offset-2">
    {{ $slot }}
  </div>
</div>
