<form method="POST" action="{{ route('adoption.preregister') }}" class="flex flex-col gap-4 sm:flex-row sm:items-start">
  @csrf
  <p class="hidden">
    <label>
      Ne pas remplir si vous êtes humain·e : <input name="societe" />
    </label>
  </p>

  <div class="flex-1">
    @if ($errors->any())
      <p class="mb-3 rounded-xl border border-wood/40 bg-wood/10 px-4 py-3 text-sm text-[#7c5334]">
        Une erreur est survenue lors de l'envoi — vérifiez votre email et réessayez.
      </p>
    @endif
    <label for="preinscription-email" class="sr-only">Adresse email</label>
    <input
      id="preinscription-email"
      name="email"
      type="email"
      required
      autocomplete="email"
      placeholder="votre@email.fr"
      value="{{ old('email') }}"
      class="w-full rounded-full border border-line bg-paper px-5 py-3.5 text-ink placeholder:text-ink/40 focus-visible:border-marsh"
    />
    <div class="mt-3 flex items-start gap-2.5">
      <input
        id="preinscription-rgpd"
        name="consentement_rgpd"
        type="checkbox"
        required
        class="mt-0.5 h-4 w-4 shrink-0 rounded border-line text-marsh focus-visible:outline-wood"
      />
      <label for="preinscription-rgpd" class="text-xs text-ink/60 leading-relaxed">
        J'accepte d'être recontacté·e par email au sujet de l'ouverture des adoptions, voir la
        <a href="{{ route('confidentialite') }}" class="underline decoration-wood/50 underline-offset-2">politique de confidentialité</a>.
      </label>
    </div>
  </div>

  <button
    type="submit"
    class="shrink-0 rounded-full bg-wood px-6 py-3.5 font-semibold text-paper shadow-[0_4px_0_0_rgba(43,58,64,0.18)] transition-all hover:bg-[#96603d] hover:translate-y-[2px] hover:shadow-[0_2px_0_0_rgba(43,58,64,0.18)] active:translate-y-[4px] active:shadow-none"
  >
    Me prévenir
  </button>
</form>
