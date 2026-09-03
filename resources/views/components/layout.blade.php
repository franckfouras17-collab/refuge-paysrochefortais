@props(['title' => 'Accueil', 'description' => ''])
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <title>{{ $title ?? 'Accueil' }} · Refuge Canin du Pays Rochefortais</title>
    <meta name="description" content="{{ $description ?? "Le Refuge Canin du Pays Rochefortais est une association Loi 1901 en cours de création en Charente-Maritime." }}" />
    <meta name="author" content="Refuge Canin du Pays Rochefortais" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title ?? 'Accueil' }} · Refuge Canin du Pays Rochefortais" />
    <meta property="og:description" content="{{ $description ?? '' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:site_name" content="Refuge Canin du Pays Rochefortais" />

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
  </body>
</html>
