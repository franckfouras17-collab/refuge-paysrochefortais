@php
  $steps = [
    ['title' => 'Candidature', 'duration' => 'en ligne', 'icon' => 'clipboard',
      'description' => "La famille intéressée dépose une candidature décrivant son foyer, son mode de vie et ses attentes vis-à-vis d'un chien."],
    ['title' => "Entretien avec l'équipe", 'duration' => 'échange', 'icon' => 'users',
      'description' => "Un membre de l'équipe échange avec la famille pour mieux cerner ses besoins et orienter vers un chien compatible."],
    ['title' => 'Visite du chien en famille', 'duration' => 'au refuge', 'icon' => 'paw',
      'description' => "Une rencontre est organisée au refuge, en présence de tous les membres du foyer concernés par l'adoption."],
    ['title' => "Période d'essai et suivi", 'duration' => 'post-adoption', 'icon' => 'house',
      'description' => "Une période d'adaptation est prévue, avec un suivi de l'association après le départ du chien vers son nouveau foyer."],
  ];
  $criteria = [
    "Un engagement sur toute la durée de vie de l'animal",
    'Une compatibilité entre le chien et le mode de vie du foyer',
    "L'accord de l'ensemble des membres du foyer",
  ];
  $faqItems = [
    ['q' => 'Puis-je adopter dès aujourd\'hui ?', 'a' => "Pas encore : le refuge est en cours de création et n'héberge aucun animal pour le moment. Cette page présente le processus tel qu'il est envisagé ; elle sera activée avec de vrais profils de chiens dès l'ouverture."],
    ['q' => "Comment serai-je prévenu·e de l'ouverture des adoptions ?", 'a' => "En laissant votre email dans le formulaire de pré-inscription ci-dessus, vous serez averti·e en priorité dès la mise en ligne des premiers profils d'animaux."],
    ['q' => "Les frais d'adoption couvrent-ils l'identification et les soins ?", 'a' => "Oui, les frais d'adoption envisagés incluront l'identification du chien (puce électronique) ainsi que ses premiers soins réalisés au refuge."],
    ['q' => "Les critères d'adoption sont-ils déjà définitifs ?", 'a' => "Non. Les grandes lignes présentées ici (engagement dans la durée, compatibilité avec le foyer, accord de tous ses membres) reflètent la philosophie du projet, mais les règles précises seront validées par l'association au moment de l'ouverture."],
  ];
  $ci = \App\Models\ContentItem::class;
@endphp
<x-layout title="Adoption" description="L'adoption est la finalité du Refuge Canin du Pays Rochefortais. Découvrez le processus d'adoption envisagé et pré-inscrivez-vous pour être averti·e dès l'ouverture.">

  <x-page-hero
    eyebrow="Adoption"
    title="Trouver à chaque chien une famille responsable : notre raison d'être"
    :lede="$ci::get('adoption.hero.lede', \"Accueillir un animal n'est jamais une fin en soi.\")"
  />

  @if ($dogs->isNotEmpty())
    <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Chiens actuellement à l'adoption</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">Ils attendent une famille</h2>

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
    </section>
  @endif

  <section class="mx-auto max-w-8xl px-5 sm:px-8 {{ $dogs->isNotEmpty() ? 'pb-16 sm:pb-20' : 'py-16 sm:py-20' }}">
    <x-callout tone="warning" class="max-w-3xl">
      <strong>Le refuge n'est pas encore construit.</strong>
      @if ($dogs->isEmpty())
        Il n'y a donc pas encore de chiens à adopter.
      @endif
      {{ $ci::get('adoption.warning.text', "Cette page présente par avance le processus envisagé ; elle sera activée avec les premiers profils d'animaux dès l'ouverture du refuge.") }}
    </x-callout>
  </section>

  {{-- Processus --}}
  <section class="bg-sand/40 border-y border-line">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20">
      <div class="max-w-2xl">
        <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Le processus envisagé</p>
        <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
          Quatre étapes pour une adoption réussie
        </h2>
      </div>
      <div class="mt-12 max-w-2xl">
        <x-timeline :steps="$steps" />
      </div>
    </div>
  </section>

  {{-- Critères --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-12 lg:grid-cols-2">
    <div>
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Les critères envisagés</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        {{ $ci::get('adoption.criteres.title', 'Ce que nous chercherons à vérifier') }}
      </h2>
      <p class="mt-4 text-ink/70 leading-relaxed">
        {{ $ci::get('adoption.criteres.text', 'Ces grandes lignes reflètent la philosophie du projet.') }}
      </p>
      <ul class="mt-6 flex flex-col gap-4">
        @foreach ($criteria as $c)
          <li class="flex gap-3 text-ink/85">
            <x-icon name="check-circle" class="w-5 h-5 text-marsh shrink-0 mt-0.5" />
            {{ $c }}
          </li>
        @endforeach
      </ul>
    </div>
    <x-card class="h-fit">
      <x-icon name="coin" class="w-6 h-6 text-marsh" />
      <h3 class="mt-4 font-display text-lg font-semibold text-ink">Frais d'adoption</h3>
      <p class="mt-2 text-ink/70 leading-relaxed">
        Les frais d'adoption envisagés couvriront l'identification du chien (puce électronique) et
        ses premiers soins reçus au refuge. Le montant précis sera communiqué à l'ouverture.
      </p>
    </x-card>
  </section>

  {{-- Pré-inscription --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 pb-16 sm:pb-20">
    <div class="rounded-3xl border border-line bg-marsh/6 p-8 sm:p-12">
      <div class="max-w-xl">
        <h2 class="font-display text-2xl sm:text-3xl font-semibold text-ink">
          {{ $ci::get('adoption.preinscription.title', "Soyez averti·e en priorité de l'ouverture des adoptions") }}
        </h2>
        <p class="mt-3 text-ink/70 leading-relaxed">
          {{ $ci::get('adoption.preinscription.text', 'Laissez votre email : nous vous préviendrons dès la mise en ligne des premiers profils.') }}
        </p>
      </div>
      <div class="mt-6 max-w-xl">
        <x-pre-register-form />
      </div>
    </div>
  </section>

  {{-- FAQ --}}
  <section class="mx-auto max-w-8xl px-5 sm:px-8 pb-20 sm:pb-28">
    <div class="max-w-2xl mb-10">
      <p class="text-sm font-semibold uppercase tracking-[0.14em] text-wood">Questions fréquentes</p>
      <h2 class="mt-3 font-display text-3xl sm:text-4xl font-semibold text-ink">
        Vos questions sur l'adoption
      </h2>
    </div>
    <div class="max-w-3xl">
      <x-faq :items="$faqItems" />
    </div>
  </section>

</x-layout>
