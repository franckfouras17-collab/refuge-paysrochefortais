<x-layout title="Accueil" description="Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime.">

  <section class="relative overflow-hidden bg-sand/50">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 pt-16 sm:pt-24 pb-24 sm:pb-32">
      <span class="inline-flex items-center gap-2 rounded-full bg-wood/12 px-4 py-2 text-sm font-semibold text-[#7c5334] ring-1 ring-wood/30">
        Association en cours de création — le refuge n'est pas encore ouvert
      </span>

      <h1 class="mt-6 font-display text-4xl sm:text-5xl lg:text-[3.4rem] font-semibold leading-[1.08] text-ink max-w-3xl">
        {{ \App\Models\ContentItem::get('home.hero.title', 'Offrir une seconde chance à chaque chien recueilli, et lui trouver une famille responsable.') }}
      </h1>

      <p class="mt-6 max-w-xl text-lg text-ink/70 leading-relaxed">
        {{ \App\Models\ContentItem::get('home.hero.lede', "Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime.") }}
      </p>

      <div class="mt-9 flex flex-wrap items-center gap-4">
        <a href="{{ route('adoption') }}" class="rounded-full bg-wood px-6 py-3.5 font-semibold text-paper hover:bg-[#96603d]">Adopter</a>
        <a href="{{ route('admin.login') }}" class="rounded-full bg-marsh px-6 py-3.5 font-semibold text-paper hover:bg-[#3d5960]">Nous soutenir</a>
      </div>
    </div>
  </section>

</x-layout>
