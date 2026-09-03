@props(['value', 'label', 'icon'])
<div class="reveal flex flex-col items-start gap-3 rounded-2xl border border-line bg-paper/60 p-6">
  <span class="flex h-11 w-11 items-center justify-center rounded-full bg-marsh/10 text-marsh">
    <x-icon :name="$icon" class="w-5 h-5" />
  </span>
  <p class="font-display text-3xl font-semibold text-ink">{{ $value }}</p>
  <p class="text-sm text-ink/65 leading-snug">{{ $label }}</p>
</div>
