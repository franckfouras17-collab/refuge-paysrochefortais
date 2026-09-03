<x-layout title="Adoption" description="Chiens actuellement à l'adoption au Refuge Canin du Pays Rochefortais.">

  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Adoption</p>
    <h1 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">Chiens actuellement à l'adoption</h1>

    @if ($dogs->isEmpty())
      <div class="mt-8 max-w-2xl rounded-2xl border border-line bg-sand/40 p-6 text-ink/70">
        Aucun chien disponible à l'adoption pour le moment. Revenez bientôt, ou
        <a href="mailto:contact@refuge-paysrochefortais.fr" class="text-marsh underline underline-offset-2">contactez-nous</a>
        pour être averti·e dès l'ouverture des adoptions.
      </div>
    @else
      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($dogs as $dog)
          <div class="rounded-2xl border border-line bg-paper overflow-hidden">
            @if ($dog->photos->first())
              <img src="{{ \Illuminate\Support\Facades\Storage::url($dog->photos->first()->filename) }}" alt="{{ $dog->name }}" class="h-52 w-full object-cover" />
            @else
              <div class="flex h-52 w-full items-center justify-center bg-sand text-ink/40">Photo à venir</div>
            @endif
            <div class="p-5">
              <p class="font-display text-xl font-semibold text-ink">{{ $dog->name }}</p>
              <p class="mt-1 text-sm text-ink/60">
                {{ $dog->age_label }}
                @if ($dog->sex) · {{ $dog->sex === 'male' ? 'Mâle' : 'Femelle' }} @endif
                @if ($dog->size) · {{ ucfirst($dog->size) }} @endif
              </p>
              @if ($dog->description)
                <p class="mt-3 text-sm text-ink/70 leading-relaxed">{{ Str::limit($dog->description, 140) }}</p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </section>

</x-layout>
