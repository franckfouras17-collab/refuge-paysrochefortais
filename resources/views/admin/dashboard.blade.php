<x-admin-layout title="Tableau de bord">
  <h1 class="font-display text-2xl font-semibold text-ink">Tableau de bord</h1>
  <p class="mt-2 text-ink/70">Bienvenue, {{ auth()->user()->name }}.</p>

  <div class="mt-8 grid gap-5 sm:grid-cols-2 max-w-2xl">
    <a href="{{ route('admin.dogs.index') }}" class="rounded-2xl border border-line bg-paper p-6 hover:border-marsh/40">
      <p class="font-display text-3xl font-semibold text-ink">{{ $dogsCount }}</p>
      <p class="mt-1 text-sm text-ink/60">fiche(s) chien</p>
    </a>

    @if (auth()->user()->isAdmin())
      <a href="{{ route('admin.content.index') }}" class="rounded-2xl border border-line bg-paper p-6 hover:border-marsh/40">
        <p class="font-display text-lg font-semibold text-ink">Contenu du site</p>
        <p class="mt-1 text-sm text-ink/60">Modifier les textes et images</p>
      </a>
    @endif
  </div>
</x-admin-layout>
