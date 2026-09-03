@php
  $steps = [
    ['title' => 'Constitution juridique', 'duration' => '1 à 1,5 mois', 'icon' => 'clipboard',
      'description' => "Création formelle de l'association Loi 1901 et mise en place de sa gouvernance."],
    ['title' => 'Financement et recherche foncière', 'duration' => '6 à 12 mois, en parallèle', 'icon' => 'coin',
      'description' => 'Constitution du plan de financement et recherche active du terrain agricole ciblé.'],
    ['title' => 'Dossier ICPE et permis de construire', 'duration' => '6 à 12 mois', 'icon' => 'shield',
      'description' => 'Instruction du dossier réglementaire ICPE (rubrique 2120) et du permis de construire.'],
    ['title' => 'Construction', 'duration' => '3 à 6 mois', 'icon' => 'kennel',
      'description' => 'Édification des bâtiments modulaires en ossature bois sur pieux vissés.'],
    ['title' => 'Ouverture', 'duration' => '1 à 2 mois', 'icon' => 'house',
      'description' => 'Derniers aménagements, recrutement et mise en service du refuge.'],
  ];
@endphp
<x-layout title="Budget et calendrier" description="Estimation du budget d'investissement de la phase 1 et calendrier prévisionnel de constitution, financement, construction et ouverture du refuge.">

  <x-page-hero eyebrow="Budget & calendrier" title="Une estimation en cours d'affinage, un calendrier réaliste" />

  {{-- Budget --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Budget d'investissement — Phase 1</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        140 000 € à 200 000 €+ TTC
      </h2>
    </div>

    <div class="mt-8 max-w-md">
      <x-stat-tile value="140 000 – 200 000 €+" label="TTC, estimation par ratio en cours de consolidation par devis réels" icon="coin" />
    </div>

    <x-callout tone="warning" class="mt-8 max-w-2xl">
      <strong>Ce montant est une estimation, pas un chiffre définitif.</strong> Il a été établi par
      ratio et sera affiné au fur et à mesure de l'obtention de devis réels auprès des
      prestataires.
    </x-callout>
  </section>

  {{-- Calendrier --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Calendrier prévisionnel</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          De la constitution juridique à l'ouverture
        </h2>
      </div>

      <div class="mt-12 max-w-2xl">
        <x-timeline :steps="$steps" />
      </div>

      <div class="mt-10 grid gap-5 sm:grid-cols-2 max-w-2xl">
        <div class="rounded-2xl border border-line bg-paper p-6">
          <p class="text-sm font-semibold text-ink/60">Meilleur des cas</p>
          <p class="mt-1 font-display text-2xl font-semibold text-ink">14 à 16 mois</p>
        </div>
        <div class="rounded-2xl border border-line bg-paper p-6">
          <p class="text-sm font-semibold text-ink/60">Estimation réaliste</p>
          <p class="mt-1 font-display text-2xl font-semibold text-ink">24 à 30 mois</p>
        </div>
      </div>
    </div>
  </section>

</x-layout>
