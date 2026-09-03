<x-admin-layout title="{{ $item->label }}">
  <a href="{{ route('admin.content.index') }}" class="text-sm font-semibold text-marsh hover:underline">← Retour au contenu</a>

  <h1 class="mt-3 font-display text-2xl font-semibold text-ink">{{ $item->label }}</h1>
  <p class="mt-1 text-sm text-ink/50">{{ $item->content_key }}</p>

  <form method="POST" action="{{ route('admin.content.update', $item) }}" enctype="multipart/form-data" class="mt-6 max-w-2xl flex flex-col gap-5">
    @csrf
    @method('PUT')

    @if ($item->type === 'image')
      @if ($item->value)
        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->value) }}" alt="" class="w-full max-w-sm rounded-xl border border-line" />
      @endif
      <div class="flex flex-col gap-2">
        <label for="image" class="text-sm font-semibold text-ink">Nouvelle image</label>
        <input id="image" name="image" type="file" accept="image/*" class="text-sm" />
        <p class="text-xs text-ink/50">L'image est redimensionnée automatiquement à la bonne taille pour cet emplacement.</p>
        @error('image')
          <p class="text-sm text-wood">{{ $message }}</p>
        @enderror
      </div>
    @elseif ($item->type === 'richtext')
      <div class="flex flex-col gap-2">
        <label for="value" class="text-sm font-semibold text-ink">Texte</label>
        <textarea id="value" name="value" rows="8" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">{{ old('value', $item->value) }}</textarea>
      </div>
    @else
      <div class="flex flex-col gap-2">
        <label for="value" class="text-sm font-semibold text-ink">Texte</label>
        <input id="value" name="value" type="text" value="{{ old('value', $item->value) }}" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      </div>
    @endif

    <button type="submit" class="self-start rounded-full bg-marsh px-6 py-3 font-semibold text-paper hover:bg-[#3d5960]">
      Enregistrer
    </button>
  </form>
</x-admin-layout>
