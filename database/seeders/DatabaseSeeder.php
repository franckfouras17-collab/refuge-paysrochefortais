<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Crée un compte admin et un compte utilisateur de test avec des mots
     * de passe générés aléatoirement (jamais committés en clair), affichés
     * une seule fois dans la console.
     */
    public function run(): void
    {
        $adminPassword = Str::password(16);
        $userPassword = Str::password(16);

        User::updateOrCreate(
            ['email' => 'admin@refuge-paysrochefortais.fr'],
            ['name' => 'Admin', 'password' => $adminPassword, 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'benevole@refuge-paysrochefortais.fr'],
            ['name' => 'Bénévole', 'password' => $userPassword, 'role' => 'utilisateur']
        );

        $this->command->warn('Comptes de test créés — notez ces mots de passe, ils ne seront plus affichés :');
        $this->command->line("  admin@refuge-paysrochefortais.fr      / {$adminPassword}");
        $this->command->line("  benevole@refuge-paysrochefortais.fr   / {$userPassword}");

        $this->call(ContentSeeder::class);
    }
}
