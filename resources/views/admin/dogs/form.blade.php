@php $isEdit = $dog->exists; @endphp
<x-admin-layout :title="$isEdit ? $dog->name : 'Nouveau chien'">
  <a href="{{ route('admin.dogs.index') }}" class="text-sm font-semibold text-marsh hover:underline">← Retour aux chiens</a>

  <h1 class="mt-3 font-display text-2xl font-semibold text-ink">
    {{ $isEdit ? "Modifier {$dog->name}" : 'Nouveau chien' }}
  </h1>

  <form
    method="POST"
    action="{{ $isEdit ? route('admin.dogs.update', $dog) : route('admin.dogs.store') }}"
    enctype="multipart/form-data"
    class="mt-6 max-w-2xl flex flex-col gap-5"
  >
    @csrf
    @if ($isEdit) @method('PUT') @endif

    <div class="flex flex-col gap-2">
      <label for="name" class="text-sm font-semibold text-ink">Nom</label>
      <input id="name" name="name" type="text" required value="{{ old('name', $dog->name) }}"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      @error('name') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <div class="flex flex-col gap-2">
      <label for="description" class="text-sm font-semibold text-ink">Description</label>
      <textarea id="description" name="description" rows="5"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">{{ old('description', $dog->description) }}</textarea>
    </div>

    <div class="grid gap-5 sm:grid-cols-3">
      <div class="flex flex-col gap-2">
        <label for="age_label" class="text-sm font-semibold text-ink">Âge</label>
        <input id="age_label" name="age_label" type="text" placeholder="ex : environ 2 ans" value="{{ old('age_label', $dog->age_label) }}"
          class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      </div>
      <div class="flex flex-col gap-2">
        <label for="sex" class="text-sm font-semibold text-ink">Sexe</label>
        <select id="sex" name="sex" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">
          <option value="">—</option>
          <option value="male" @selected(old('sex', $dog->sex) === 'male')>Mâle</option>
          <option value="femelle" @selected(old('sex', $dog->sex) === 'femelle')>Femelle</option>
        </select>
      </div>
      <div class="flex flex-col gap-2">
        <label for="size" class="text-sm font-semibold text-ink">Taille</label>
        <select id="size" name="size" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">
          <option value="">—</option>
          <option value="petit" @selected(old('size', $dog->size) === 'petit')>Petit</option>
          <option value="moyen" @selected(old('size', $dog->size) === 'moyen')>Moyen</option>
          <option value="grand" @selected(old('size', $dog->size) === 'grand')>Grand</option>
        </select>
      </div>
    </div>

    <div class="flex flex-col gap-2">
      <label for="status" class="text-sm font-semibold text-ink">Statut</label>
      <select id="status" name="status" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">
        <option value="disponible" @selected(old('status', $dog->status ?? 'disponible') === 'disponible')>Disponible</option>
        <option value="reserve" @selected(old('status', $dog->status) === 'reserve')>Réservé</option>
        <option value="adopte" @selected(old('status', $dog->status) === 'adopte')>Adopté</option>
      </select>
    </div>

    @if ($isEdit && $dog->photos->isNotEmpty())
      <div>
        <p class="text-sm font-semibold text-ink">Photos actuelles</p>
        <div class="mt-2 flex flex-wrap gap-3">
          @foreach ($dog->photos as $photo)
            <div class="relative">
              <img src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="" class="h-24 w-24 rounded-lg object-cover" />
              <form method="POST" action="{{ route('admin.dogs.photos.destroy', [$dog, $photo]) }}" class="absolute -right-2 -top-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex h-6 w-6 items-center justify-center rounded-full bg-ink text-xs text-paper" title="Supprimer">×</button>
              </form>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    <div class="flex flex-col gap-2">
      <label for="photos" class="text-sm font-semibold text-ink">Ajouter des photos</label>
      <input id="photos" name="photos[]" type="file" accept="image/*" multiple class="text-sm" />
      @error('photos.*') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="self-start rounded-full bg-marsh px-6 py-3 font-semibold text-paper hover:bg-[#3d5960]">
      Enregistrer
    </button>
  </form>

  @if ($isEdit)
    <form method="POST" action="{{ route('admin.dogs.destroy', $dog) }}" class="mt-8 max-w-2xl border-t border-line pt-6"
      onsubmit="return confirm('Supprimer définitivement cette fiche ?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="text-sm font-semibold text-wood hover:underline">Supprimer cette fiche</button>
    </form>
  @endif
</x-admin-layout>
