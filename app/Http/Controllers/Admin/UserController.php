<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.users.form', ['editUser' => new User()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120', 'unique:users,name'],
            'password' => ['required', Password::min(8)],
            'role' => ['required', 'in:admin,utilisateur'],
        ]);

        User::create($data);

        return redirect()->route('admin.users.index')->with('status', "Compte de {$data['name']} créé.");
    }

    public function edit(User $user)
    {
        return view('admin.users.form', ['editUser' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120', Rule::unique('users', 'name')->ignore($user->id)],
            'password' => ['nullable', Password::min(8)],
            'role' => ['required', 'in:admin,utilisateur'],
        ]);

        // On ne peut pas se retirer soi-même les droits admin (éviter de se
        // retrouver bloqué hors de la gestion des utilisateurs).
        if ($user->id === Auth::id() && $data['role'] !== 'admin') {
            return back()->withErrors(['role' => 'Vous ne pouvez pas retirer vos propres droits administrateur.']);
        }

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('status', "Compte de {$user->name} mis à jour.");
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->withErrors(['user' => 'Vous ne pouvez pas supprimer votre propre compte.']);
        }

        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return back()->withErrors(['user' => 'Impossible de supprimer le dernier compte administrateur.']);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('status', "Compte de {$user->name} supprimé.");
    }
}
