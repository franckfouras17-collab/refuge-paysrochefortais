@php
  $extensions = [
    ['icon' => 'kennel', 'title' => 'Module de boxes supplémentaires', 'text' => "Une extension de la capacité d'accueil au-delà des 10 à 12 places initiales."],
    ['icon' => 'paw', 'title' => 'Volet félin (chatterie)', 'text' => "L'ouverture d'un espace dédié à l'accueil et à l'adoption de chats."],
    ['icon' => 'shield', 'title' => 'Dispensaire vétérinaire solidaire', 'text' => 'Un accès facilité aux soins vétérinaires pour les foyers aux ressources modestes.'],
    ['icon' => 'leaf', 'title' => 'Volet pédagogique', 'text' => 'Des temps d\'accueil scolaire pour sensibiliser au bien-être et à la responsabilité animale.'],
    ['icon' => 'map-pin', 'title' => 'Extension territoriale', 'text' => 'Une convention étendue à d\'autres communes au-delà du périmètre initial de la CARO.'],
  ];
  $ci = \App\Models\ContentItem::class;
@endphp
<x-layout title="Capacité et extensions" description="Capacité d'accueil initiale du refuge et pistes d'extension envisagées à moyen terme : chatterie, dispensaire solidaire, volet pédagogique.">

  <x-page-hero eyebrow="Capacité & extensions" :title="$ci::get('capacite.hero.title', 'Une phase 1 dimensionnée, des extensions déjà réfléchies')" />

  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Phase 1</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        {{ $ci::get('capacite.phase1.title', 'Une capacité initiale de 10 à 12 chiens') }}
      </h2>
    </div>

    <div class="mt-10 grid gap-5 sm:grid-cols-2">
      <x-stat-tile value="10 à 12 chiens" label="hébergés simultanément en phase 1" icon="kennel" />
      <x-stat-tile value="60 à 90 chiens / an" label="accueillis, selon la durée moyenne de séjour" icon="calendar" />
    </div>

    <x-callout tone="note" class="mt-8 max-w-2xl">
      L'estimation de 60 à 90 chiens accueillis par an est indicative : elle dépend directement de
      la durée moyenne de séjour de chaque animal et ne constitue pas une garantie.
    </x-callout>
  </section>

  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">À moyen terme</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          {{ $ci::get('capacite.extensions.title', "Des pistes d'extension déjà identifiées") }}
        </h2>
        <p class="mt-4 text-lg text-ink/70 leading-relaxed">
          {{ $ci::get('capacite.extensions.text', 'Une fois la phase 1 stabilisée, plusieurs pistes de développement sont envisagées.') }}
        </p>
      </div>

      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($extensions as $e)
          <x-card>
            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-marsh/10 text-marsh">
              <x-icon :name="$e['icon']" class="w-5 h-5" />
            </span>
            <h3 class="mt-4 font-display text-lg font-semibold text-ink">{{ $e['title'] }}</h3>
            <p class="mt-2 text-ink/70 leading-relaxed">{{ $e['text'] }}</p>
          </x-card>
        @endforeach
      </div>
    </div>
  </section>

</x-layout>
