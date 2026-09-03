@php
  $cols = [
    ['title' => 'Le projet', 'links' => [
      ['route' => 'projet', 'label' => 'Constat & terrain'],
      ['route' => 'capacite-extensions', 'label' => 'Capacité & extensions'],
      ['route' => 'financement', 'label' => 'Financement'],
      ['route' => 'budget-calendrier', 'label' => 'Budget & calendrier'],
    ]],
    ['title' => "S'impliquer", 'links' => [
      ['route' => 'adoption', 'label' => 'Adoption'],
      ['route' => 'nous-soutenir', 'label' => 'Nous soutenir'],
      ['route' => 'contact', 'label' => 'Contact'],
    ]],
    ['title' => 'Informations légales', 'links' => [
      ['route' => 'mentions-legales', 'label' => 'Mentions légales'],
      ['route' => 'confidentialite', 'label' => 'Confidentialité & RGPD'],
    ]],
  ];
@endphp
<footer class="relative mt-24 border-t border-line bg-ink text-paper/90">
  <div class="mx-auto max-w-8xl px-5 sm:px-8 py-14 grid gap-12 lg:grid-cols-[1.4fr_1fr_1fr_1fr]">
    <div>
      <a href="{{ route('home') }}" class="flex items-center gap-3.5">
        <span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-paper p-2.5">
          <img src="/images/brand-mark.png" alt="Refuge Canin du Pays Rochefortais" class="h-full w-auto object-contain" />
        </span>
        <span class="brand-title-group flex flex-col items-start leading-tight">
          <span class="brand-title font-display text-[1.47rem] font-semibold text-paper whitespace-nowrap">Refuge Canin</span>
          <span class="brand-subtitle text-sm font-medium text-paper/60 whitespace-nowrap">du Pays Rochefortais</span>
        </span>
      </a>
      <p class="mt-4 max-w-sm text-sm leading-relaxed text-paper/65">
        Association Loi 1901 en cours de création, pour l'accueil et l'adoption responsable des
        chiens du territoire de la Communauté d'Agglomération Rochefort Océan.
      </p>
      <p class="mt-5 inline-flex items-center gap-2 rounded-full bg-paper/10 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-paper/75">
        <x-icon name="clock" class="w-3.5 h-3.5" />
        Projet en cours de création
      </p>
    </div>

    @foreach ($cols as $col)
      <div>
        <p class="font-display text-sm font-semibold uppercase tracking-wide text-paper/50">
          {{ $col['title'] }}
        </p>
        <ul class="mt-4 space-y-3 text-sm">
          @foreach ($col['links'] as $link)
            <li>
              <a href="{{ route($link['route']) }}" class="text-paper/80 hover:text-teal transition-colors">
                {{ $link['label'] }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>

  <div class="border-t border-paper/10">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs text-paper/55">
      <p>© {{ date('Y') }} Refuge Canin du Pays Rochefortais — Association Loi 1901</p>
      <p>Fouras (17450), Charente-Maritime</p>
    </div>
  </div>
</footer>
