<x-admin-layout title="Contenu du site">
  <h1 class="font-display text-2xl font-semibold text-ink">Contenu du site</h1>
  <p class="mt-2 text-ink/70">Textes et images modifiables, regroupés par page.</p>

  <div class="mt-8 flex flex-col gap-8 max-w-3xl">
    @foreach ($itemsByPage as $page => $items)
      <div>
        <h2 class="text-sm font-semibold uppercase tracking-wide text-wood">{{ ucfirst($page) }}</h2>
        <div class="mt-3 flex flex-col divide-y divide-line rounded-2xl border border-line bg-paper">
          @foreach ($items as $item)
            <a href="{{ route('admin.content.edit', $item) }}" class="flex items-center justify-between gap-4 p-4 hover:bg-marsh/5">
              <div>
                <p class="font-semibold text-ink">{{ $item->label }}</p>
                <p class="mt-0.5 text-sm text-ink/60 line-clamp-1">
                  @if ($item->type === 'image')
                    Image
                  @else
                    {{ Str::limit($item->value, 80) }}
                  @endif
                </p>
              </div>
              <span class="shrink-0 text-sm font-semibold text-marsh">Modifier</span>
            </a>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</x-admin-layout>
