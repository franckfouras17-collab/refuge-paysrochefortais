@php
  $levels = [
    ['tone' => 'teal', 'label' => 'Quasi maîtrisable', 'icon' => 'check-circle',
      'intro' => "Des sources de financement locales, sur lesquelles l'association garde la main.",
      'items' => [
        'Dons de proximité des habitants du territoire',
        "Cotisations des adhérents de l'association",
        "Mécénat local d'entreprises, avec réduction fiscale pouvant aller jusqu'à 60 %",
      ]],
    ['tone' => 'marsh', 'label' => 'À négocier', 'icon' => 'clipboard',
      'intro' => "Des financements publics à obtenir, dans le cadre d'échanges avec les collectivités.",
      'items' => [
        'Subventions d\'investissement de la CARO et des communes membres',
        'Aide du Département de la Charente-Maritime',
        "Dispositif Local d'Accompagnement (DLA) de la Région Nouvelle-Aquitaine",
      ]],
    ['tone' => 'wood', 'label' => 'Compétitif / incertain', 'icon' => 'compass',
      'intro' => 'Des appels à projets nationaux, avec délai et résultat non garantis.',
      'items' => [
        "Fondations nationales de protection animale : 30 Millions d'Amis, Fondation Brigitte Bardot, Fondation Sommer, Assistance aux Animaux",
        'Sur appel à projet, avec un délai de 6 à 12 mois',
        "Sans garantie d'obtention",
      ]],
  ];
  $ci = \App\Models\ContentItem::class;
@endphp
<x-layout title="Financement" description="Trois niveaux de certitude pour le financement du refuge : dons et mécénat local, subventions publiques à négocier, et fondations nationales sur appel à projet.">

  <x-page-hero
    eyebrow="Financement"
    title="Trois niveaux de certitude, présentés en toute transparence"
    :lede="$ci::get('financement.hero.lede', \"Plutôt que d'annoncer un plan de financement figé, nous distinguons ce qui est quasi maîtrisable, ce qui reste à négocier, et ce qui relève de démarches compétitives.\")"
  />

  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="grid gap-6 lg:grid-cols-3">
      @foreach ($levels as $i => $level)
        <div class="flex flex-col rounded-2xl border border-line bg-paper p-7">
          <div class="flex items-center justify-between gap-3">
            <span class="text-xs font-semibold uppercase tracking-wide text-ink/40">
              Niveau {{ $i + 1 }}
            </span>
            <x-icon :name="$level['icon']" class="w-5 h-5 text-ink/30" />
          </div>
          <x-badge :tone="$level['tone']" class="mt-4 self-start">
            {{ $level['label'] }}
          </x-badge>
          <p class="mt-4 text-ink/70 leading-relaxed">{{ $level['intro'] }}</p>
          <ul class="mt-5 flex flex-col gap-3 text-sm text-ink/75">
            @foreach ($level['items'] as $item)
              <li class="flex gap-2.5">
                <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-ink/30"></span>
                {{ $item }}
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </section>

</x-layout>
