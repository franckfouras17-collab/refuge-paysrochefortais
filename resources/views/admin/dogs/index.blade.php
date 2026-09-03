<x-admin-layout title="Chiens à l'adoption">
  <div class="flex items-center justify-between gap-4">
    <h1 class="font-display text-2xl font-semibold text-ink">Chiens à l'adoption</h1>
    <a href="{{ route('admin.dogs.create') }}" class="rounded-full bg-marsh px-5 py-2.5 text-sm font-semibold text-paper hover:bg-[#3d5960]">
      + Ajouter un chien
    </a>
  </div>

  @if ($dogs->isEmpty())
    <p class="mt-8 text-ink/60">Aucune fiche pour le moment.</p>
  @else
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($dogs as $dog)
        <a href="{{ route('admin.dogs.edit', $dog) }}" class="rounded-2xl border border-line bg-paper p-5 hover:border-marsh/40">
          @if ($dog->photos->first())
            <img src="{{ \Illuminate\Support\Facades\Storage::url($dog->photos->first()->filename) }}" alt="" class="mb-4 h-40 w-full rounded-xl object-cover" />
          @else
            <div class="mb-4 flex h-40 w-full items-center justify-center rounded-xl bg-sand text-sm text-ink/40">Pas de photo</div>
          @endif
          <p class="font-display text-lg font-semibold text-ink">{{ $dog->name }}</p>
          <p class="mt-1 text-sm text-ink/60">{{ ucfirst($dog->status) }}</p>
        </a>
      @endforeach
    </div>
  @endif
</x-admin-layout>
