@props(['eyebrow', 'title', 'lede' => null])
<section class="relative overflow-hidden border-b border-line bg-sand/50">
  <div class="mx-auto max-w-8xl px-5 sm:px-8 pt-16 pb-20 sm:pt-20 sm:pb-24">
    <p class="mb-4 inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-[0.14em] text-wood">{{ $eyebrow }}</p>
    <h1 class="max-w-3xl text-4xl sm:text-5xl font-semibold text-ink leading-[1.1]">{{ $title }}</h1>
    @if ($lede)
      <p class="mt-5 max-w-2xl text-lg sm:text-xl text-ink/70 leading-relaxed">{{ $lede }}</p>
    @endif
  </div>
  <x-decorative-curve variant="a" class="absolute bottom-0 left-0 w-full h-16 sm:h-24" />
</section>
