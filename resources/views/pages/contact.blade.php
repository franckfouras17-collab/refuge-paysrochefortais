<x-layout title="Contact" description="Contactez le Refuge Canin du Pays Rochefortais, association Loi 1901 basée à Fouras en Charente-Maritime.">

  <x-page-hero eyebrow="Contact" title="Une question, une proposition&nbsp;? Écrivez-nous" />

  <section class="mx-auto max-w-8xl px-5 sm:px-8 py-16 sm:py-20 grid gap-14 lg:grid-cols-[0.85fr_1.15fr]">
    <div>
      <dl class="flex flex-col gap-6">
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-marsh/10 text-marsh">
            <x-icon name="users" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Président</dt>
            <dd class="text-ink font-medium">Franck DAVID</dd>
          </div>
        </div>
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-marsh/10 text-marsh">
            <x-icon name="clipboard" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Statut</dt>
            <dd class="text-ink font-medium">Association Loi 1901</dd>
          </div>
        </div>
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-marsh/10 text-marsh">
            <x-icon name="house" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Siège social</dt>
            <dd class="text-ink font-medium">Fouras (17450), Charente-Maritime</dd>
          </div>
        </div>
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-marsh/10 text-marsh">
            <x-icon name="map-pin" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Territoire d'intervention</dt>
            <dd class="text-ink font-medium">Communauté d'Agglomération Rochefort Océan</dd>
          </div>
        </div>
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-marsh/10 text-marsh">
            <x-icon name="mail" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Email</dt>
            <dd class="text-ink font-medium">
              <a href="mailto:contact@refuge-paysrochefortais.fr" class="hover:text-marsh">contact@refuge-paysrochefortais.fr</a>
            </dd>
          </div>
        </div>
        <div class="flex gap-4">
          <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-sand text-ink/40">
            <x-icon name="phone" class="w-5 h-5" />
          </span>
          <div>
            <dt class="text-sm font-semibold text-ink/50">Téléphone</dt>
            <dd class="text-ink/50 italic">Coordonnées à venir</dd>
          </div>
        </div>
      </dl>
    </div>

    <div class="rounded-3xl border border-line bg-sand/40 p-7 sm:p-10">
      <h2 class="font-display text-2xl font-semibold text-ink">Envoyer un message</h2>
      <p class="mt-2 text-ink/65">Nous répondons dès que possible, dans la mesure de nos moyens bénévoles.</p>
      <div class="mt-8">
        <x-contact-form />
      </div>
    </div>
  </section>

</x-layout>
