@php $isEdit = $editUser->exists; @endphp
<x-admin-layout :title="$isEdit ? $editUser->name : 'Nouvel utilisateur'">
  <a href="{{ route('admin.users.index') }}" class="text-sm font-semibold text-marsh hover:underline">← Retour aux utilisateurs</a>

  <h1 class="mt-3 font-display text-2xl font-semibold text-ink">
    {{ $isEdit ? "Modifier {$editUser->name}" : 'Nouvel utilisateur' }}
  </h1>

  <form
    method="POST"
    action="{{ $isEdit ? route('admin.users.update', $editUser) : route('admin.users.store') }}"
    class="mt-6 max-w-lg flex flex-col gap-5"
  >
    @csrf
    @if ($isEdit) @method('PUT') @endif

    <div class="flex flex-col gap-2">
      <label for="name" class="text-sm font-semibold text-ink">Nom</label>
      <input id="name" name="name" type="text" required value="{{ old('name', $editUser->name) }}"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      @error('name') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <div class="flex flex-col gap-2">
      <label for="email" class="text-sm font-semibold text-ink">Email</label>
      <input id="email" name="email" type="email" required value="{{ old('email', $editUser->email) }}"
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      @error('email') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <div class="flex flex-col gap-2">
      <label for="password" class="text-sm font-semibold text-ink">
        Mot de passe {{ $isEdit ? '(laisser vide pour ne pas le changer)' : '' }}
      </label>
      <input id="password" name="password" type="password" {{ $isEdit ? '' : 'required' }}
        class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh" />
      <p class="text-xs text-ink/50">Au moins 8 caractères. Compte interne à l'association, pas d'email de confirmation envoyé.</p>
      @error('password') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <div class="flex flex-col gap-2">
      <label for="role" class="text-sm font-semibold text-ink">Rôle</label>
      <select id="role" name="role" class="rounded-xl border border-line bg-paper px-4 py-3 text-ink focus-visible:border-marsh">
        <option value="utilisateur" @selected(old('role', $editUser->role ?? 'utilisateur') === 'utilisateur')>Utilisateur·rice — chiens à l'adoption uniquement</option>
        <option value="admin" @selected(old('role', $editUser->role) === 'admin')>Administrateur·rice — accès complet</option>
      </select>
      @error('role') <p class="text-sm text-wood">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="self-start rounded-full bg-marsh px-6 py-3 font-semibold text-paper hover:bg-[#3d5960]">
      Enregistrer
    </button>
  </form>

  @if ($isEdit)
    <form method="POST" action="{{ route('admin.users.destroy', $editUser) }}" class="mt-8 max-w-lg border-t border-line pt-6"
      onsubmit="return confirm('Supprimer définitivement ce compte ?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="text-sm font-semibold text-wood hover:underline">Supprimer ce compte</button>
    </form>
  @endif
</x-admin-layout>
