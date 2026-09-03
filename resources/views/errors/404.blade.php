<x-layout title="Page introuvable" description="Cette page n'existe pas." :noindex="true">
  <section class="mx-auto max-w-2xl px-5 sm:px-8 py-24 sm:py-32 text-center">
    <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-sand text-marsh">
      <x-icon name="compass" class="w-7 h-7" />
    </span>
    <h1 class="mt-6 font-display text-3xl sm:text-4xl font-semibold text-ink">Page introuvable</h1>
    <p class="mt-4 text-lg text-ink/70 leading-relaxed">
      La page que vous cherchez n'existe pas ou a été déplacée.
    </p>
    <div class="mt-8 flex justify-center">
      <x-button href="{{ route('home') }}">Retour à l'accueil</x-button>
    </div>
  </section>
</x-layout>
