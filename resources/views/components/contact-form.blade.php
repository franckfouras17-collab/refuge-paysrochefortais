<form method="POST" action="{{ route('contact.send') }}" class="flex flex-col gap-5">
  @csrf

  @if ($errors->any())
    <p class="rounded-xl border border-wood/40 bg-wood/10 px-4 py-3 text-sm text-[#7c5334]">
      Une erreur est survenue lors de l'envoi — vérifiez les champs et réessayez, ou écrivez-nous
      directement à l'adresse indiquée plus haut.
    </p>
  @endif

  <p class="hidden">
    <label>
      Ne pas remplir si vous êtes humain·e : <input name="societe" />
    </label>
  </p>

  <div class="grid gap-5 sm:grid-cols-2">
    <div class="flex flex-col gap-2">
      <label for="contact-nom" class="text-sm font-semibold text-ink">Nom et prénom</label>
      <input
        id="contact-nom"
        name="nom"
        type="text"
        required
        autocomplete="name"
        value="{{ old('nom') }}"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink placeholder:text-ink/35 focus-visible:border-marsh"
      />
    </div>
    <div class="flex flex-col gap-2">
      <label for="contact-email" class="text-sm font-semibold text-ink">Adresse email</label>
      <input
        id="contact-email"
        name="email"
        type="email"
        required
        autocomplete="email"
        value="{{ old('email') }}"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink placeholder:text-ink/35 focus-visible:border-marsh"
      />
    </div>
  </div>

  <div class="flex flex-col gap-2">
    <label for="contact-message" class="text-sm font-semibold text-ink">Message</label>
    <textarea
      id="contact-message"
      name="message"
      rows="5"
      required
      class="resize-y rounded-xl border border-line bg-paper px-4 py-3 text-ink placeholder:text-ink/35 focus-visible:border-marsh"
    >{{ old('message') }}</textarea>
  </div>

  <div class="flex items-start gap-3">
    <input
      id="contact-rgpd"
      name="consentement_rgpd"
      type="checkbox"
      required
      class="mt-1 h-4 w-4 shrink-0 rounded border-line text-marsh focus-visible:outline-wood"
    />
    <label for="contact-rgpd" class="text-sm text-ink/70 leading-relaxed">
      J'accepte que les informations saisies dans ce formulaire soient utilisées par le Refuge
      Canin du Pays Rochefortais pour traiter ma demande, conformément à la
      <a href="{{ route('confidentialite') }}" class="underline decoration-wood/50 underline-offset-2">politique de confidentialité</a>.
    </label>
  </div>

  <button
    type="submit"
    class="mt-2 self-start rounded-full bg-marsh px-7 py-3.5 font-semibold text-paper shadow-[0_4px_0_0_rgba(43,58,64,0.18)] transition-all hover:bg-[#3d5960] hover:translate-y-[2px] hover:shadow-[0_2px_0_0_rgba(43,58,64,0.18)] active:translate-y-[4px] active:shadow-none"
  >
    Envoyer le message
  </button>
</form>
