<x-layout title="Message envoyé" description="Votre message a bien été envoyé au Refuge Canin du Pays Rochefortais.">

  <section class="mx-auto max-w-2xl px-5 sm:px-8 py-24 sm:py-32 text-center">
    <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-marsh text-paper">
      <x-icon name="check-circle" class="w-7 h-7" />
    </span>
    <h1 class="mt-6 font-display text-3xl sm:text-4xl font-semibold text-ink">Merci&nbsp;!</h1>
    <p class="mt-4 text-lg text-ink/70 leading-relaxed">
      Votre message a bien été transmis. Nous vous répondrons dès que possible, dans la mesure de
      nos moyens bénévoles.
    </p>
    <div class="mt-8 flex justify-center">
      <x-button href="{{ route('home') }}">Retour à l'accueil</x-button>
    </div>
  </section>

</x-layout>
