<x-admin-layout title="Utilisateurs">
  <div class="flex items-center justify-between gap-4">
    <h1 class="font-display text-2xl font-semibold text-ink">Utilisateurs</h1>
    <a href="{{ route('admin.users.create') }}" class="rounded-full bg-marsh px-5 py-2.5 text-sm font-semibold text-paper hover:bg-[#3d5960]">
      + Créer un compte
    </a>
  </div>

  <div class="mt-8 overflow-hidden rounded-2xl border border-line bg-paper">
    <table class="w-full text-left text-sm">
      <thead>
        <tr class="border-b border-line text-xs font-semibold uppercase tracking-wide text-ink/50">
          <th class="px-5 py-3">Nom</th>
          <th class="px-5 py-3">Email</th>
          <th class="px-5 py-3">Rôle</th>
          <th class="px-5 py-3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr class="border-b border-line last:border-0">
            <td class="px-5 py-3.5 font-semibold text-ink">{{ $user->name }}</td>
            <td class="px-5 py-3.5 text-ink/70">{{ $user->email }}</td>
            <td class="px-5 py-3.5 text-ink/70">{{ $user->role === 'admin' ? 'Administrateur·rice' : 'Utilisateur·rice' }}</td>
            <td class="px-5 py-3.5 text-right">
              <a href="{{ route('admin.users.edit', $user) }}" class="text-sm font-semibold text-marsh hover:underline">Modifier</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-admin-layout>
