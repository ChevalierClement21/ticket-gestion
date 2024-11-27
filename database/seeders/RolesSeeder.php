<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Silber\Bouncer\Database\Role;
use Silber\Bouncer\Database\Ability;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les rôles
        Role::create(['name' => 'admin', 'title' => 'Administrator']);
        Role::create(['name' => 'client', 'title' => 'Client']);
        Role::create(['name' => 'developer', 'title' => 'Developer']);

        // Créer les capacités
        Ability::create(['name' => 'view-all-tickets', 'title' => 'View All Tickets']);
        Ability::create(['name' => 'assign-tickets', 'title' => 'Assign Tickets']);
        Ability::create(['name' => 'manage-users', 'title' => 'Manage Users']);
        Ability::create(['name' => 'manage-categories', 'title' => 'Manage Categories and Priorities']);

        Ability::create(['name' => 'create-ticket', 'title' => 'Create Ticket']);
        Ability::create(['name' => 'view-own-tickets', 'title' => 'View Own Tickets']);
        Ability::create(['name' => 'update-ticket', 'title' => 'Update Ticket']);
        Ability::create(['name' => 'close-ticket', 'title' => 'Close Ticket']);

        Ability::create(['name' => 'view-assigned-tickets', 'title' => 'View Assigned Tickets']);
        Ability::create(['name' => 'comment-ticket', 'title' => 'Comment on Ticket']);
        Ability::create(['name' => 'resolve-ticket', 'title' => 'Resolve Ticket']);

        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->allow([
            'view-all-tickets',  // Voir tous les tickets
            'assign-tickets',    // Affecter des tickets
            'manage-users',      // Gérer les utilisateurs
            'manage-categories', // Gérer les catégories et priorités
        ]);

        $clientRole = Role::where('name', 'client')->first();
        $clientRole->allow([
            'create-ticket',     // Créer un ticket
            'view-own-tickets',  // Voir ses propres tickets
            'update-ticket',     // Modifier un ticket
            'close-ticket',      // Fermer un ticket (Terminé ou Annulé)
        ]);

        $developerRole = Role::where('name', 'developer')->first();
        $developerRole->allow([
            'view-assigned-tickets',
            'comment-ticket',
            'resolve-ticket',
        ]);

        Bouncer::assign('admin')->to(User::find(2)); // Admin
        Bouncer::assign('developer')->to(User::find(3)); // Développeur
        Bouncer::assign('client')->to(User::find(4)); // Client
    }
}
