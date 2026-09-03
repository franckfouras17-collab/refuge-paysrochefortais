@php
  $ways = [
    ['icon' => 'users', 'title' => 'Le bénévolat', 'text' => "Rejoindre le bureau ou le conseil d'administration, ou participer à des actions de terrain (communication, événements, prospection de foncier, préparation de dossiers)."],
    ['icon' => 'hand-heart', 'title' => 'Les dons et le mécénat', 'text' => "Soutenir financièrement le projet, en tant que particulier ou en tant qu'entreprise via le mécénat."],
    ['icon' => 'map-pin', 'title' => 'Le signalement de foncier', 'text' => 'Signaler un terrain agricole disponible dans le secteur rétro-littoral de Fouras ou de Saint-Laurent-de-la-Prée.'],
  ];
@endphp
<x-layout title="Nous soutenir" description="Trois façons de soutenir le Refuge Canin du Pays Rochefortais : bénévolat, dons et mécénat, ou signalement de foncier disponible.">

  <x-page-hero eyebrow="Nous soutenir" title="Trois façons de faire avancer le projet" />

  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
    <div class="grid gap-6 lg:grid-cols-3">
      @foreach ($ways as $w)
        <x-card>
          <span class="flex h-12 w-12 items-center justify-center rounded-full bg-marsh text-paper">
            <x-icon :name="$w['icon']" class="w-5 h-5" />
          </span>
          <h3 class="mt-5 font-display text-xl font-semibold text-ink">{{ $w['title'] }}</h3>
          <p class="mt-2 text-ink/70 leading-relaxed">{{ $w['text'] }}</p>
        </x-card>
      @endforeach
    </div>
  </section>

  {{-- Don --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-10 lg:grid-cols-2 items-start">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Faire un don</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          Une plateforme de don sécurisée, bientôt disponible
        </h2>
        <p class="mt-4 text-ink/70 leading-relaxed">
          La collecte de dons en ligne sera assurée via HelloAsso. L'intégration est en attente de
          mise en place.
        </p>
        <div class="mt-6">
          <button
            type="button"
            disabled
            aria-disabled="true"
            class="inline-flex items-center gap-2 rounded-full bg-wood/40 px-6 py-3.5 font-semibold text-paper cursor-not-allowed"
          >
            <x-icon name="coin" class="w-4 h-4" />
            Faire un don — bientôt disponible
          </button>
        </div>
      </div>
      <x-callout tone="note">
        En attendant la mise en ligne du module de don, vous pouvez nous contacter directement
        pour tout soutien financier ou mécénat d'entreprise.
        <div class="mt-4">
          <x-button href="{{ route('contact') }}" variant="ghost">Nous contacter</x-button>
        </div>
      </x-callout>
    </div>
  </section>

  {{-- Bénévolat --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-10 lg:grid-cols-2">
    <div class="flex h-full flex-col">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Bénévolat</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        Donner de son temps, au bureau ou sur le terrain
      </h2>
      <p class="mt-4 text-ink/70 leading-relaxed">
        L'association se construit aussi grâce à l'engagement de ses bénévoles : gouvernance
        (bureau, conseil d'administration), communication, événements, ou aide administrative.
      </p>
      <div class="mt-auto pt-6">
        <x-button href="{{ route('contact') }}" variant="secondary">Proposer mon aide</x-button>
      </div>
    </div>
    <div class="flex h-full flex-col">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Foncier</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        Vous connaissez un terrain disponible&nbsp;?
      </h2>
      <p class="mt-4 text-ink/70 leading-relaxed">
        Terrain agricole (zone A du PLU) d'au moins 5 000 m², secteur de Fouras (Soumard) ou de
        Saint-Laurent-de-la-Prée : faites-le nous savoir.
      </p>
      <div class="mt-auto pt-6">
        <x-button href="{{ route('contact') }}" variant="ghost">Signaler un terrain</x-button>
      </div>
    </div>
  </section>

</x-layout>
