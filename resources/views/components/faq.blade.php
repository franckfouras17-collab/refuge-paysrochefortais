@props(['items'])
<div class="flex flex-col divide-y divide-line rounded-2xl border border-line bg-paper">
  @foreach ($items as $item)
    <details class="group p-5 sm:p-6 open:pb-6">
      <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-display text-lg font-semibold text-ink marker:content-none">
        {{ $item['q'] }}
        <x-icon name="chevron-down" class="w-5 h-5 shrink-0 text-marsh transition-transform duration-200 group-open:rotate-180" />
      </summary>
      <p class="mt-3 text-ink/70 leading-relaxed">{{ $item['a'] }}</p>
    </details>
  @endforeach
</div>
