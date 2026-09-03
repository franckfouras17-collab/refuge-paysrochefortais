<header class="sticky top-0 z-50 border-b border-line/70 bg-paper/95 backdrop-blur">
  <div class="mx-auto flex max-w-8xl items-center justify-between gap-6 px-5 py-6 sm:px-8">
    <a href="{{ route('home') }}" class="flex items-center gap-3.5 shrink-0">
      <img src="/images/brand-mark.png" alt="Refuge Canin du Pays Rochefortais" class="h-16 w-auto shrink-0 object-contain" />
      <span class="flex flex-col leading-tight">
        <span class="font-display text-[1.47rem] font-semibold text-ink whitespace-nowrap">Refuge Canin</span>
        <span class="text-sm font-medium text-ink/55 whitespace-nowrap">du Pays Rochefortais</span>
      </span>
    </a>

    <nav aria-label="Navigation principale" class="hidden lg:block">
      <ul class="flex items-center gap-1 text-[0.95rem] font-semibold">
        <li>
          <a href="{{ route('adoption') }}" class="block rounded-full px-4 py-2.5 text-ink transition-colors hover:bg-marsh/5 hover:text-marsh">
            Adoption
          </a>
        </li>
      </ul>
    </nav>

    <div class="hidden lg:flex items-center gap-3 shrink-0">
      <a href="{{ route('adoption') }}" class="rounded-full border-2 border-marsh px-5 py-2.5 text-sm font-semibold text-marsh transition-colors hover:bg-marsh hover:text-paper">
        Adopter
      </a>
      @auth
        <a href="{{ route('admin.dashboard') }}" class="rounded-full bg-wood px-5 py-2.5 text-sm font-semibold text-paper transition-colors hover:bg-[#96603d]">
          Espace admin
        </a>
      @else
        <a href="{{ route('admin.login') }}" class="rounded-full bg-wood px-5 py-2.5 text-sm font-semibold text-paper transition-colors hover:bg-[#96603d]">
          Connexion
        </a>
      @endauth
    </div>
  </div>
</header>
