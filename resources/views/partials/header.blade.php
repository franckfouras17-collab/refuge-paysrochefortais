@php
  $projectLinks = [
    ['route' => 'projet', 'label' => 'Constat & terrain', 'text' => 'Pourquoi ce projet, et où', 'icon' => 'map-pin'],
    ['route' => 'capacite-extensions', 'label' => 'Capacité & extensions', 'text' => 'Combien de chiens, et après', 'icon' => 'kennel'],
    ['route' => 'financement', 'label' => 'Financement', 'text' => 'Trois niveaux de certitude', 'icon' => 'coin'],
    ['route' => 'budget-calendrier', 'label' => 'Budget & calendrier', 'text' => 'Estimation et étapes', 'icon' => 'calendar'],
  ];
  $projectActive = request()->routeIs(['projet', 'capacite-extensions', 'financement', 'budget-calendrier']);
@endphp
<header class="sticky top-0 z-50 border-b border-line/70 bg-paper/95 backdrop-blur">
  <div class="mx-auto flex max-w-8xl items-center justify-between gap-6 px-5 py-6 sm:px-8">
    <a href="{{ route('home') }}" class="flex items-center gap-3.5 shrink-0">
      <img src="/images/brand-mark.png" alt="Refuge Canin du Pays Rochefortais" class="h-16 w-auto shrink-0 object-contain" />
      <span class="brand-title-group flex flex-col items-start leading-tight">
        <span class="brand-title font-display text-[1.47rem] font-semibold text-ink whitespace-nowrap">Refuge Canin</span>
        <span class="brand-subtitle text-sm font-medium text-ink/55 whitespace-nowrap">du Pays Rochefortais</span>
      </span>
    </a>

    <nav aria-label="Navigation principale" class="hidden lg:block">
      <ul class="flex items-center gap-1 text-[0.95rem] font-semibold">
        <li class="relative">
          <button
            type="button"
            id="project-menu-toggle"
            aria-haspopup="true"
            aria-expanded="false"
            aria-controls="project-menu"
            class="flex items-center gap-1.5 rounded-full px-4 py-2.5 transition-colors {{ $projectActive ? 'bg-marsh/10 text-marsh' : 'text-ink hover:text-marsh hover:bg-marsh/5' }}"
          >
            Le projet
            <span id="project-menu-chevron" class="transition-transform duration-200">
              <x-icon name="chevron-down" class="w-4 h-4" />
            </span>
          </button>

          <div
            id="project-menu"
            class="hidden absolute left-1/2 top-full z-10 mt-2 w-[27rem] -translate-x-1/2 rounded-2xl border border-line bg-paper p-3 shadow-[0_16px_40px_-16px_rgba(43,58,64,0.35)]"
          >
            <ul class="grid grid-cols-2 gap-1">
              @foreach ($projectLinks as $link)
                <li>
                  <a href="{{ route($link['route']) }}" class="flex flex-col gap-2 rounded-xl p-3.5 hover:bg-marsh/6">
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-marsh/10 text-marsh">
                      <x-icon :name="$link['icon']" class="w-4 h-4" />
                    </span>
                    <span>
                      <span class="block text-sm font-semibold text-ink">{{ $link['label'] }}</span>
                      <span class="block text-xs font-normal text-ink/55 mt-0.5">{{ $link['text'] }}</span>
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </li>

        <li>
          <a href="{{ route('adoption') }}" aria-current="{{ request()->routeIs('adoption') ? 'page' : 'false' }}"
            class="block rounded-full px-4 py-2.5 transition-colors {{ request()->routeIs('adoption') ? 'bg-marsh/10 text-marsh' : 'text-ink hover:text-marsh hover:bg-marsh/5' }}">
            Adoption
          </a>
        </li>
        <li>
          <a href="{{ route('contact') }}" aria-current="{{ request()->routeIs('contact') ? 'page' : 'false' }}"
            class="block rounded-full px-4 py-2.5 transition-colors {{ request()->routeIs('contact') ? 'bg-marsh/10 text-marsh' : 'text-ink hover:text-marsh hover:bg-marsh/5' }}">
            Contact
          </a>
        </li>
      </ul>
    </nav>

    <div class="hidden lg:flex items-center gap-3 shrink-0">
      <a href="{{ route('adoption') }}" class="rounded-full border-2 border-marsh px-5 py-2.5 text-sm font-semibold text-marsh transition-colors hover:bg-marsh hover:text-paper">
        Adopter
      </a>
      <a href="{{ route('nous-soutenir') }}" class="rounded-full bg-wood px-5 py-2.5 text-sm font-semibold text-paper transition-colors hover:bg-[#96603d]">
        Nous soutenir
      </a>
    </div>

    <button
      type="button"
      id="menu-toggle"
      class="lg:hidden flex h-11 w-11 items-center justify-center rounded-full border border-line text-ink"
      aria-expanded="false"
      aria-controls="mobile-nav"
    >
      <span id="menu-icon-open"><x-icon name="menu" class="w-5 h-5" /></span>
      <span id="menu-icon-close" class="hidden"><x-icon name="close" class="w-5 h-5" /></span>
      <span class="sr-only">Ouvrir le menu</span>
    </button>
  </div>

  <div id="mobile-nav" class="lg:hidden hidden border-t border-line bg-paper px-5 pb-6 pt-2">
    <ul class="flex flex-col divide-y divide-line/70 text-base">
      <li>
        <details class="group py-1">
          <summary class="flex cursor-pointer list-none items-center justify-between py-2.5 font-semibold text-ink marker:content-none">
            Le projet
            <x-icon name="chevron-down" class="w-4 h-4 text-marsh transition-transform duration-200 group-open:rotate-180" />
          </summary>
          <ul class="flex flex-col gap-1 pb-2 pl-2">
            @foreach ($projectLinks as $link)
              <li>
                <a href="{{ route($link['route']) }}" class="flex items-center gap-3 rounded-lg py-2.5 text-[0.95rem] text-ink/80 hover:text-marsh">
                  <x-icon :name="$link['icon']" class="w-4 h-4 text-marsh shrink-0" />
                  {{ $link['label'] }}
                </a>
              </li>
            @endforeach
          </ul>
        </details>
      </li>
      <li>
        <a href="{{ route('adoption') }}" class="block py-3.5 font-semibold text-ink hover:text-marsh">Adoption</a>
      </li>
      <li>
        <a href="{{ route('contact') }}" class="block py-3.5 font-semibold text-ink hover:text-marsh">Contact</a>
      </li>
    </ul>
    <div class="mt-5 flex flex-col gap-3">
      <a href="{{ route('adoption') }}" class="rounded-full border-2 border-marsh px-5 py-3 text-center text-sm font-semibold text-marsh">
        Adopter
      </a>
      <a href="{{ route('nous-soutenir') }}" class="rounded-full bg-wood px-5 py-3 text-center text-sm font-semibold text-paper">
        Nous soutenir
      </a>
    </div>
  </div>
</header>

<script>
  const toggle = document.getElementById("menu-toggle");
  const panel = document.getElementById("mobile-nav");
  const iconOpen = document.getElementById("menu-icon-open");
  const iconClose = document.getElementById("menu-icon-close");

  toggle?.addEventListener("click", () => {
    const expanded = toggle.getAttribute("aria-expanded") === "true";
    toggle.setAttribute("aria-expanded", String(!expanded));
    panel?.classList.toggle("hidden");
    iconOpen?.classList.toggle("hidden");
    iconClose?.classList.toggle("hidden");
    closeProjectMenu();
  });

  const desktopQuery = window.matchMedia("(min-width: 64rem)");
  desktopQuery.addEventListener("change", (e) => {
    if (e.matches) {
      panel?.classList.add("hidden");
      iconOpen?.classList.remove("hidden");
      iconClose?.classList.add("hidden");
      toggle?.setAttribute("aria-expanded", "false");
    }
  });

  const projectToggle = document.getElementById("project-menu-toggle");
  const projectMenu = document.getElementById("project-menu");
  const projectChevron = document.getElementById("project-menu-chevron");

  function closeProjectMenu() {
    projectMenu?.classList.add("hidden");
    projectToggle?.setAttribute("aria-expanded", "false");
    projectChevron?.classList.remove("rotate-180");
  }

  function openProjectMenu() {
    projectMenu?.classList.remove("hidden");
    projectToggle?.setAttribute("aria-expanded", "true");
    projectChevron?.classList.add("rotate-180");
  }

  projectToggle?.addEventListener("click", () => {
    const expanded = projectToggle.getAttribute("aria-expanded") === "true";
    expanded ? closeProjectMenu() : openProjectMenu();
  });

  document.addEventListener("click", (e) => {
    if (!(e.target instanceof Node)) return;
    if (!projectToggle?.contains(e.target) && !projectMenu?.contains(e.target)) {
      closeProjectMenu();
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeProjectMenu();
      projectToggle?.blur();
    }
  });
</script>
