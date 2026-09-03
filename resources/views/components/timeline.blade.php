@props(['steps'])
<ol class="relative flex flex-col gap-10 sm:gap-12">
  <div class="absolute left-6 top-6 bottom-6 w-px bg-line sm:left-7" aria-hidden="true"></div>
  @foreach ($steps as $i => $step)
    <li class="reveal relative flex gap-5 sm:gap-6">
      <span class="relative z-10 flex h-12 w-12 sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-full bg-marsh text-paper">
        <x-icon :name="$step['icon']" class="w-5 h-5 sm:w-6 sm:h-6" />
      </span>
      <div class="pt-1.5">
        <p class="text-xs font-semibold uppercase tracking-wide text-wood">Étape {{ $i + 1 }} · {{ $step['duration'] }}</p>
        <h3 class="mt-1.5 font-display text-xl font-semibold text-ink">{{ $step['title'] }}</h3>
        <p class="mt-2 text-ink/70 leading-relaxed max-w-xl">{{ $step['description'] }}</p>
      </div>
    </li>
  @endforeach
</ol>
