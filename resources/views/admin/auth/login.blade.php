<x-admin-layout title="Connexion">
  <div class="flex min-h-screen items-center justify-center px-5">
    <div class="w-full max-w-sm rounded-2xl border border-line bg-paper p-8">
      <div class="flex flex-col items-center text-center">
        <img src="/images/brand-mark.png" alt="" class="h-14 w-auto object-contain" />
        <h1 class="mt-4 font-display text-xl font-semibold text-ink">Espace administration</h1>
        <p class="mt-1 text-sm text-ink/60">Refuge Canin du Pays Rochefortais</p>
      </div>

      @if ($errors->any())
        <div class="mt-6 rounded-xl border border-wood/40 bg-wood/10 px-4 py-3 text-sm text-[#7c5334]">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.login.submit') }}" class="mt-6 flex flex-col gap-4">
        @csrf
        <div class="flex flex-col gap-2">
          <label for="email" class="text-sm font-semibold text-ink">Email</label>
          <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
            class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
        </div>
        <div class="flex flex-col gap-2">
          <label for="password" class="text-sm font-semibold text-ink">Mot de passe</label>
          <input id="password" name="password" type="password" required
            class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
        </div>
        <button type="submit" class="mt-2 rounded-full bg-marsh px-6 py-3 font-semibold text-paper hover:bg-[#3d5960]">
          Se connecter
        </button>
      </form>
    </div>
  </div>
</x-admin-layout>
