<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'create_category',
            'edit_category',
            'delete_category',
            'manage_users',
            'manage_services',
            'manage_reservations',
            'cancel_reservation',
            'edit_settings',
            'make_reservation',
            'edit_information',
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

         $adminRole = Role::where('nom', 'admin')->first();
         $prestataireRole = Role::where('nom', 'prestataire')->first();
         $clientRole = Role::where('nom', 'client')->first();
 
         DB::table('permission_role')->insert([
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'create_category')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'edit_category')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'delete_category')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'manage_users')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'manage_services')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'manage_reservations')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'cancel_reservation')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'edit_settings')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'make_reservation')->first()->id],
             ['role_id' => $adminRole->id, 'permission_id' => Permission::where('name', 'edit_information')->first()->id],
         ]);
 
         DB::table('permission_role')->insert([
             ['role_id' => $prestataireRole->id, 'permission_id' => Permission::where('name', 'manage_reservations')->first()->id],
             ['role_id' => $prestataireRole->id, 'permission_id' => Permission::where('name', 'cancel_reservation')->first()->id],
             ['role_id' => $prestataireRole->id, 'permission_id' => Permission::where('name', 'manage_services')->first()->id],
             ['role_id' => $prestataireRole->id, 'permission_id' => Permission::where('name', 'edit_settings')->first()->id],
         ]);
 
         DB::table('permission_role')->insert([
             ['role_id' => $clientRole->id, 'permission_id' => Permission::where('name', 'make_reservation')->first()->id],
             ['role_id' => $clientRole->id, 'permission_id' => Permission::where('name', 'edit_information')->first()->id],
             ['role_id' => $clientRole->id, 'permission_id' => Permission::where('name', 'cancel_reservation')->first()->id],
         ]);
    }
}
