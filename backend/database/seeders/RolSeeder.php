<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de roles 
        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Empleado']);
        
        //Creamos permisos  - permitiendo identificar los tipos de permiso
        Permission::create(['name' => 'admin.cargos.ver']) -> syncRoles([$role1], [$role2]);
        Permission::create(['name' => 'admin.cargos.crear']) -> syncRoles([$role1]);
        Permission::create(['name' => 'admin.cargos.editar']) -> syncRoles([$role1]);
        Permission::create(['name' => 'admin.cargos.eliminar']) -> syncRoles([$role1]);

        Permission::create(['name' => 'admin.capacitaciones.ver']) -> syncRoles([$role1], [$role2]);
        Permission::create(['name' => 'admin.capacitaciones.crear']) -> syncRoles([$role1]);
        Permission::create(['name' => 'admin.capacitaciones.editar']) -> syncRoles([$role1]);
        Permission::create(['name' => 'admin.capacitaciones.eliminar']) -> syncRoles([$role1]);
    }
}