@props(['title' => 'Administration'])
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <title>{{ $title }} · Administration · Refuge Canin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;0,700;1,500&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    @vite('resources/css/app.css')
  </head>
  <body class="min-h-screen bg-sand/40 text-ink antialiased">
    @auth
      <div class="flex min-h-screen">
        <aside class="w-64 shrink-0 border-r border-line bg-paper px-5 py-8 hidden lg:block">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <img src="/images/brand-mark.png" alt="" class="h-10 w-auto object-contain" />
            <span class="font-display text-base font-semibold text-ink">Administration</span>
          </a>

          <nav class="mt-10 flex flex-col gap-1 text-sm font-semibold">
            <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-3 py-2.5 text-ink/80 hover:bg-marsh/8 hover:text-marsh {{ request()->routeIs('admin.dashboard') ? 'bg-marsh/10 text-marsh' : '' }}">
              Tableau de bord
            </a>
            <a href="{{ route('admin.dogs.index') }}" class="rounded-lg px-3 py-2.5 text-ink/80 hover:bg-marsh/8 hover:text-marsh {{ request()->routeIs('admin.dogs.*') ? 'bg-marsh/10 text-marsh' : '' }}">
              Chiens à l'adoption
            </a>
            @if (auth()->user()->isAdmin())
              <a href="{{ route('admin.content.index') }}" class="rounded-lg px-3 py-2.5 text-ink/80 hover:bg-marsh/8 hover:text-marsh {{ request()->routeIs('admin.content.*') ? 'bg-marsh/10 text-marsh' : '' }}">
                Contenu du site
              </a>
              <a href="{{ route('admin.users.index') }}" class="rounded-lg px-3 py-2.5 text-ink/80 hover:bg-marsh/8 hover:text-marsh {{ request()->routeIs('admin.users.*') ? 'bg-marsh/10 text-marsh' : '' }}">
                Utilisateurs
              </a>
            @endif
          </nav>

          <div class="mt-10 border-t border-line pt-5">
            <p class="text-xs text-ink/50">Connecté·e en tant que</p>
            <p class="text-sm font-semibold text-ink">{{ auth()->user()->name }}</p>
            <p class="text-xs text-ink/50">{{ auth()->user()->role === 'admin' ? 'Administrateur·rice' : 'Utilisateur·rice' }}</p>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-3">
              @csrf
              <button type="submit" class="text-sm font-semibold text-wood hover:underline">Se déconnecter</button>
            </form>
          </div>
        </aside>

        <div class="flex-1 px-5 py-8 sm:px-10">
          @if (session('status'))
            <div class="mb-6 rounded-xl border border-marsh/30 bg-marsh/8 px-4 py-3 text-sm text-marsh">
              {{ session('status') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="mb-6 rounded-xl border border-wood/30 bg-wood/8 px-4 py-3 text-sm text-wood">
              {{ $errors->first() }}
            </div>
          @endif

          {{ $slot }}
        </div>
      </div>
    @else
      {{ $slot }}
    @endauth
  </body>
</html>
