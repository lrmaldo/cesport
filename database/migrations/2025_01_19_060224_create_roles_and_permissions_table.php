<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear roles y permisos
        $adminRole = Role::create(['name' => 'administrador']);
        $organizerRole = Role::create(['name' => 'organizador']);

        Permission::create(['name' => 'manage events']);
        Permission::create(['name' => 'view reports']);

        $adminRole->givePermissionTo('manage events');
        $adminRole->givePermissionTo('view reports');
        $organizerRole->givePermissionTo('manage events');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar roles y permisos
        Role::findByName('administrador')->delete();
        Role::findByName('organizador')->delete();
        Permission::findByName('manage events')->delete();
        Permission::findByName('view reports')->delete();
    }
};
