<footer class="relative mt-24 border-t border-line bg-ink text-paper/90">
  <div class="mx-auto max-w-8xl px-5 sm:px-8 py-14">
    <a href="{{ route('home') }}" class="flex items-center gap-3.5">
      <span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-paper p-2.5">
        <img src="/images/brand-mark.png" alt="Refuge Canin du Pays Rochefortais" class="h-full w-auto object-contain" />
      </span>
      <span class="flex flex-col leading-tight">
        <span class="font-display text-[1.47rem] font-semibold text-paper whitespace-nowrap">Refuge Canin</span>
        <span class="text-sm font-medium text-paper/60 whitespace-nowrap">du Pays Rochefortais</span>
      </span>
    </a>
    <p class="mt-4 max-w-sm text-sm leading-relaxed text-paper/65">
      Association Loi 1901 en cours de création, pour l'accueil et l'adoption responsable des
      chiens du territoire de la Communauté d'Agglomération Rochefort Océan.
    </p>
  </div>
  <div class="border-t border-paper/10">
    <div class="mx-auto max-w-8xl px-5 sm:px-8 py-6 text-xs text-paper/55">
      © {{ date('Y') }} Refuge Canin du Pays Rochefortais — Association Loi 1901
    </div>
  </div>
</footer>
