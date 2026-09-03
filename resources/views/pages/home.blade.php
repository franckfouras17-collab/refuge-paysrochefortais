@php
  $pillars = [
    ['icon' => 'house', 'title' => 'Accueillir', 'text' => 'Recueillir les chiens errants, abandonnés ou saisis sur le territoire de la CARO, dans des conditions dignes et sécurisées.'],
    ['icon' => 'leaf', 'title' => 'Soigner', 'text' => "Assurer les soins, l'identification et le bien-être de chaque animal le temps de son séjour au refuge."],
    ['icon' => 'heart', 'title' => 'Adopter', 'text' => 'Trouver à chaque chien une famille responsable et engagée, pour une seconde chance durable.'],
  ];
@endphp
<x-layout title="Accueil" description="Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime, dont la mission est d'accueillir les chiens du territoire de la CARO et de leur trouver une famille responsable.">

  {{-- Hero --}}
  <section class="relative overflow-hidden bg-sand/50">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 pt-16 sm:pt-24 pb-24 sm:pb-32 grid gap-14 lg:grid-cols-[1.1fr_0.9fr] items-center">
      <div>
        <span class="inline-flex items-center gap-2 rounded-full bg-wood/12 px-4 py-2 text-sm font-semibold text-[#7c5334] ring-1 ring-wood/30">
          <x-icon name="clock" class="w-4 h-4" />
          Association en cours de création — le refuge n'est pas encore ouvert
        </span>

        <h1 class="mt-6 font-display text-4xl sm:text-5xl lg:text-[3.4rem] font-semibold leading-[1.08] text-ink">
          {{ \App\Models\ContentItem::get('home.hero.title', 'Offrir une seconde chance à chaque chien recueilli, et lui trouver une famille responsable.') }}
        </h1>

        <p class="mt-6 max-w-xl text-lg text-ink/70 leading-relaxed">
          {{ \App\Models\ContentItem::get('home.hero.lede', "Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime. Accueillir les chiens errants, abandonnés ou saisis n'est pas une fin en soi : c'est le moyen qui nous permet d'atteindre notre véritable objectif, une adoption réussie et durable.") }}
        </p>

        <div class="mt-9 flex flex-wrap items-center gap-4">
          <x-button href="{{ route('adoption') }}" variant="primary">Adopter</x-button>
          <x-button href="{{ route('nous-soutenir') }}" variant="secondary">Nous soutenir</x-button>
        </div>
      </div>

      <div class="relative">
        <div class="absolute -inset-6 -z-10 rounded-[2.5rem] bg-marsh/8" aria-hidden="true"></div>
        <x-photo-placeholder label="le futur refuge, une fois construit" ratio="square" />
      </div>
    </div>

    <x-decorative-curve variant="a" class="absolute bottom-0 left-0 w-full h-16 sm:h-24" />
  </section>

  {{-- Chiffres clés --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Le territoire</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        Un territoire sans refuge, aujourd'hui dépendant d'une structure extérieure
      </h2>
      <p class="mt-4 text-lg text-ink/70 leading-relaxed">
        La Communauté d'Agglomération Rochefort Océan ne dispose d'aucun refuge sur son propre
        territoire. Les chiens trouvés errants sont aujourd'hui envoyés à la SPA de Saintes,
        à une trentaine de kilomètres.
      </p>
    </div>

    <div class="mt-10 grid gap-5 sm:grid-cols-3">
      <x-stat-tile value="25 communes" label="membres de la Communauté d'Agglomération Rochefort Océan (CARO)" icon="map-pin" />
      <x-stat-tile value="63 500 habitants" label="sur 421 km² de territoire, sans refuge canin" icon="users" />
      <x-stat-tile value="≈ 30 km" label="jusqu'à la fourrière actuelle, la SPA de Saintes" icon="compass" />
    </div>

    <div class="mt-8">
      <a href="{{ route('projet') }}" class="inline-flex items-center gap-2 font-semibold text-marsh hover:text-[#3d5960]">
        Comprendre le constat et le projet
        <x-icon name="arrow-right" class="w-4 h-4" />
      </a>
    </div>
  </section>

  {{-- Trois piliers --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Notre mission</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          Accueillir n'est que le moyen. L'adoption est la finalité.
        </h2>
      </div>

      <div class="mt-10 grid gap-6 sm:grid-cols-3">
        @foreach ($pillars as $p)
          <x-card class="reveal">
            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-marsh text-paper">
              <x-icon :name="$p['icon']" class="w-5 h-5" />
            </span>
            <h3 class="mt-5 font-display text-xl font-semibold text-ink">{{ $p['title'] }}</h3>
            <p class="mt-2 text-ink/70 leading-relaxed">{{ $p['text'] }}</p>
          </x-card>
        @endforeach
      </div>

      <div class="mt-10">
        <x-button href="{{ route('adoption') }}" variant="ghost">Découvrir le processus d'adoption envisagé</x-button>
      </div>
    </div>
  </section>

  {{-- Où en est le projet --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="grid gap-12 lg:grid-cols-2 items-center">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Avancement</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          Un projet sérieux, pensé dès l'origine avec rigueur
        </h2>
        <p class="mt-4 text-lg text-ink/70 leading-relaxed">
          Recherche de terrain, dossier réglementaire ICPE, financement en trois niveaux de
          certitude, calendrier réaliste : chaque étape du projet est documentée et transparente,
          pour donner confiance aux collectivités, aux donateurs et aux futurs bénévoles.
        </p>
        <ul class="mt-6 flex flex-col gap-3 text-ink/80">
          <li class="flex items-center gap-3">
            <x-icon name="check-circle" class="w-5 h-5 text-marsh shrink-0" />
            Constitution juridique et recherche de terrain agricole (secteur de Fouras / Saint-Laurent-de-la-Prée)
          </li>
          <li class="flex items-center gap-3">
            <x-icon name="check-circle" class="w-5 h-5 text-marsh shrink-0" />
            Budget d'investissement estimé entre 140 000 € et 200 000 €+
          </li>
          <li class="flex items-center gap-3">
            <x-icon name="check-circle" class="w-5 h-5 text-marsh shrink-0" />
            Ouverture envisagée entre 14 et 30 mois selon les financements obtenus
          </li>
        </ul>
        <div class="mt-8">
          <x-button href="{{ route('budget-calendrier') }}" variant="ghost">Voir le budget et le calendrier</x-button>
        </div>
      </div>
      <x-photo-placeholder label="le terrain, une fois identifié" ratio="video" />
    </div>
  </section>

  {{-- CTA soutien --}}
  <section class="relative overflow-hidden bg-ink">
    <x-decorative-curve variant="b" class="absolute inset-0 w-full h-full" />
    <div class="relative mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-10 lg:grid-cols-[1.3fr_1fr] items-center">
      <div>
        <h2 class="font-display text-3xl sm:text-4xl font-semibold text-paper">
          Ce refuge se construira avec vous
        </h2>
        <p class="mt-4 max-w-xl text-lg text-paper/70 leading-relaxed">
          Bénévolat, dons, mécénat d'entreprise, signalement de foncier disponible : chaque forme
          de soutien rapproche le territoire de la CARO d'une solution locale et responsable.
        </p>
        <div class="mt-8 flex flex-wrap gap-4">
          <x-button href="{{ route('nous-soutenir') }}" variant="primary">Nous soutenir</x-button>
          <x-button href="{{ route('contact') }}" variant="ghost" class="!border-paper/30 !text-paper hover:!border-teal hover:!text-teal">
            Nous contacter
          </x-button>
        </div>
      </div>
      <div class="flex flex-wrap gap-3">
        <x-badge tone="teal">Bénévolat</x-badge>
        <x-badge tone="wood">Dons & mécénat</x-badge>
        <x-badge tone="outline" class="!text-paper/80 !ring-paper/25">Foncier disponible</x-badge>
      </div>
    </div>
  </section>

</x-layout>
