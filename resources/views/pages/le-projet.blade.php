@php
  $modules = [
    ['name' => 'Module A', 'area' => '70-85 m²', 'icon' => 'house', 'items' => [
      'Accueil public et bureau',
      'Infirmerie, soins et quarantaine (accès technique séparé)',
      'Vestiaire et douche du personnel',
      'Sanitaires',
    ]],
    ['name' => 'Module B', 'area' => '120 m²', 'icon' => 'kennel', 'items' => [
      '10 à 12 boxes modulaires isolés',
      '3-4 m² de couchage + 5-6 m² de cour couverte par box',
      'Grilles galvanisées, trappes guillotine',
    ]],
    ['name' => 'Module C', 'area' => '20 m²', 'icon' => 'fence', 'items' => [
      'Stockage nourriture et matériel', 'Buanderie',
    ]],
  ];
  $ci = \App\Models\ContentItem::class;
@endphp
<x-layout title="Le projet" description="Le constat, le cadre légal, le terrain recherché et les bâtiments envisagés pour le futur refuge canin du Pays Rochefortais.">

  <x-page-hero
    eyebrow="Le projet"
    title="Un projet pensé avec la même rigueur qu'une installation classée"
    :lede="$ci::get('projet.hero.lede', 'Du constat territorial au choix des matériaux, chaque décision s\'appuie sur le cadre réglementaire applicable aux fourrières et refuges.')"
  />

  {{-- Le constat --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-12 lg:grid-cols-2 items-start">
    <div>
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Le constat</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        {{ $ci::get('projet.constat.title', 'Aucune structure de refuge sur le territoire de la CARO') }}
      </h2>
      <p class="mt-5 text-ink/70 leading-relaxed">
        {{ $ci::get('projet.constat.text1', "Aujourd'hui, un chien trouvé errant sur le territoire de la CARO est envoyé à la SPA de Saintes.") }}
      </p>
      <p class="mt-4 text-ink/70 leading-relaxed">
        {{ $ci::get('projet.constat.text2', 'Deux refuges existent à proximité, mais hors périmètre CARO.') }}
      </p>
    </div>
    <x-photo-placeholder label="carte du territoire de la CARO" ratio="video" :image="$ci::image('projet.carte.image')" />
  </section>

  {{-- Pourquoi ce projet est judicieux --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Le cadre légal</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          {{ $ci::get('projet.cadre.title', 'Pourquoi ce projet est juridiquement et localement pertinent') }}
        </h2>
      </div>

      <div class="mt-10 grid gap-6 sm:grid-cols-2">
        <x-card>
          <x-icon name="shield" class="w-6 h-6 text-marsh" />
          <h3 class="mt-4 font-display text-lg font-semibold text-ink">Une obligation légale déjà externalisée</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Le service de fourrière est une obligation légale des communes (Code rural, article
            L.211-24), aujourd'hui externalisée en dehors du territoire de la CARO.
          </p>
        </x-card>
        <x-card>
          <x-icon name="clipboard" class="w-6 h-6 text-marsh" />
          <h3 class="mt-4 font-display text-lg font-semibold text-ink">Une délégation de service public possible</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Le Code rural (article L.214-6) permet la délégation de ce service à une association
            disposant de son propre refuge.
          </p>
        </x-card>
        <x-card>
          <x-icon name="map-pin" class="w-6 h-6 text-marsh" />
          <h3 class="mt-4 font-display text-lg font-semibold text-ink">Une implantation centrale</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Le terrain recherché se situe au cœur du territoire des 25 communes de la CARO,
            réduisant les distances pour l'ensemble des communes membres.
          </p>
        </x-card>
        <x-card>
          <x-icon name="check-circle" class="w-6 h-6 text-marsh" />
          <h3 class="mt-4 font-display text-lg font-semibold text-ink">Une rigueur assumée dès l'origine</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Une fourrière est elle-même une installation classée pour la protection de
            l'environnement (ICPE). Le projet est donc pensé, dès sa conception, avec cette
            même exigence réglementaire.
          </p>
        </x-card>
      </div>
    </div>
  </section>

  {{-- Le terrain --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-12 lg:grid-cols-2 items-start">
    <x-photo-placeholder label="le terrain recherché, une fois identifié" ratio="video" class="lg:order-2" :image="$ci::image('projet.terrain.image')" />
    <div class="lg:order-1">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Le terrain</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        {{ $ci::get('projet.terrain.title', 'Un terrain agricole recherché en secteur rétro-littoral') }}
      </h2>
      <p class="mt-5 text-ink/70 leading-relaxed">
        {{ $ci::get('projet.terrain.text', "La recherche se concentre sur un terrain agricole (zone A du PLU) d'au moins 5 000 m².") }}
      </p>
      <x-callout tone="note" class="mt-6">
        <strong>Contraintes réglementaires ICPE (rubrique 2120)</strong> — régime Déclaration
        entre 10 et 50 chiens hébergés, distance minimale de 100 m aux habitations tierces et
        35 m aux points d'eau.
      </x-callout>
    </div>
  </section>

  {{-- Les bâtiments --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Les bâtiments</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          {{ $ci::get('projet.batiments.title', 'Une ossature bois sur pieux vissés, adaptée au sol de marais') }}
        </h2>
        <p class="mt-4 text-lg text-ink/70 leading-relaxed">
          {{ $ci::get('projet.batiments.text', "Les bâtiments reposent sur des pieux métalliques vissés plutôt que sur une dalle béton.") }}
        </p>
      </div>

      <div class="mt-10 grid gap-6 lg:grid-cols-3">
        @foreach ($modules as $m)
          <x-card>
            <div class="flex items-center justify-between">
              <span class="flex h-11 w-11 items-center justify-center rounded-full bg-marsh/10 text-marsh">
                <x-icon :name="$m['icon']" class="w-5 h-5" />
              </span>
              <span class="text-sm font-semibold text-wood">{{ $m['area'] }}</span>
            </div>
            <h3 class="mt-4 font-display text-lg font-semibold text-ink">{{ $m['name'] }}</h3>
            <ul class="mt-3 flex flex-col gap-2 text-sm text-ink/70">
              @foreach ($m['items'] as $item)
                <li class="flex gap-2">
                  <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-wood"></span>
                  {{ $item }}
                </li>
              @endforeach
            </ul>
          </x-card>
        @endforeach
      </div>

      <div class="mt-8 grid gap-6 sm:grid-cols-2">
        <x-card>
          <h3 class="font-display text-lg font-semibold text-ink">Extérieurs</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Deux parcs d'ébat de 200 m² chacun, une zone de sociabilisation de 150 m², des clôtures
            rigides de 2 m de haut, et 250 m² de parking stabilisé.
          </p>
        </x-card>
        <x-card>
          <h3 class="font-display text-lg font-semibold text-ink">Sécurité</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">
            Vidéosurveillance IP active 24h/24, avec astreinte téléphonique et intervention sous
            30 minutes — sans gardiennage humain permanent.
          </p>
        </x-card>
      </div>
    </div>
  </section>

  {{-- Construction écoresponsable --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="grid gap-12 lg:grid-cols-2 items-center">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Construction écoresponsable</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          {{ $ci::get('projet.eco.title', 'Du bois biosourcé, pas de dalle béton') }}
        </h2>
        <ul class="mt-6 flex flex-col gap-4 text-ink/80">
          <li class="flex gap-3">
            <x-icon name="leaf" class="w-5 h-5 text-marsh shrink-0 mt-0.5" />
            Bois biosourcé et renouvelable pour l'ensemble de l'ossature
          </li>
          <li class="flex gap-3">
            <x-icon name="leaf" class="w-5 h-5 text-marsh shrink-0 mt-0.5" />
            Suppression de la dalle béton, poste très émetteur de CO₂
          </li>
          <li class="flex gap-3">
            <x-icon name="leaf" class="w-5 h-5 text-marsh shrink-0 mt-0.5" />
            Terrassement limité, préservant la perméabilité du sol
          </li>
          <li class="flex gap-3">
            <x-icon name="leaf" class="w-5 h-5 text-marsh shrink-0 mt-0.5" />
            Structure réversible, sans gravats en fin de vie
          </li>
        </ul>
      </div>
      <x-photo-placeholder label="détail de l'ossature bois sur pieux vissés" ratio="square" :image="$ci::image('projet.batiments.image')" />
    </div>
  </section>

</x-layout>
