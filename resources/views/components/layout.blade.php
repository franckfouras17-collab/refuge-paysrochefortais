@props(['title' => 'Accueil', 'description' => '', 'noindex' => false])
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="canonical" href="{{ url()->current() }}" />
    @if ($noindex)
      <meta name="robots" content="noindex, nofollow" />
    @endif

    <title>{{ $title }} · Refuge Canin du Pays Rochefortais</title>
    <meta name="description" content="{{ $description ?: "Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime." }}" />
    <meta name="author" content="Refuge Canin du Pays Rochefortais" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title }} · Refuge Canin du Pays Rochefortais" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('images/og-image.png') }}" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:site_name" content="Refuge Canin du Pays Rochefortais" />
    <meta name="twitter:card" content="summary_large_image" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;0,700;1,500&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    @vite('resources/css/app.css')
  </head>
  <body class="min-h-screen flex flex-col antialiased bg-paper text-ink">
    <a href="#contenu" class="skip-link">Aller au contenu principal</a>
    @include('partials.header')
    <main id="contenu" class="flex-1">
      {{ $slot }}
    </main>
    @include('partials.footer')

    <script>
      // Cale la largeur de "Refuge Canin" sur celle de "du Pays Rochefortais"
      // en direct dans le navigateur du visiteur (le rendu des polices varie
      // légèrement d'un moteur à l'autre).
      async function matchBrandTitleWidth() {
        await document.fonts.ready;
        document.querySelectorAll(".brand-title-group").forEach((group) => {
          const title = group.querySelector(".brand-title");
          const subtitle = group.querySelector(".brand-subtitle");
          if (!title || !subtitle) return;
          const titleWidth = title.getBoundingClientRect().width;
          const subtitleWidth = subtitle.getBoundingClientRect().width;
          if (!titleWidth || !subtitleWidth) return;
          const currentSize = parseFloat(getComputedStyle(title).fontSize);
          title.style.fontSize = `${(currentSize * subtitleWidth) / titleWidth}px`;
        });
      }
      matchBrandTitleWidth();

      const revealEls = document.querySelectorAll(".reveal");
      if (revealEls.length && "IntersectionObserver" in window) {
        const io = new IntersectionObserver(
          (entries) => {
            for (const entry of entries) {
              if (entry.isIntersecting) {
                entry.target.classList.add("reveal-in");
                io.unobserve(entry.target);
              }
            }
          },
          { threshold: 0.15, rootMargin: "0px 0px -40px 0px" },
        );
        revealEls.forEach((el) => io.observe(el));
      } else {
        revealEls.forEach((el) => el.classList.add("reveal-in"));
      }
    </script>
  </body>
</html>
