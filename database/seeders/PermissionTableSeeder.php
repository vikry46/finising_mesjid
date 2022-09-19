<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = config('permission.authorities' );

        $listPermission = [];
        $superAdminPermissions = [];
        $sekretarisPermissions = [];
        $bendaharaPermissions = [];


        foreach ($authorities as $label => $permissions) {
            foreach ($permissions as $permission) {
                $listPermission[] = [
                    'name'=> $permission,
                    'guard_name'=> 'web',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s'),
                ];
                // super admin access
                $superAdminPermissions[] = $permission;
                // sekretaris
                 if(in_array($label,['Manage Pengurus','Manage Kegiatan','Manage Jenis Kegiatan','Manage Lacon','Manage Jabatan'])){
                    $sekretarisPermissions[] = $permission; 
                 }
                //  bendahara
                 if(in_array($label,['Manage Keuangan','Manage Keuangan Mesjid','Manage Keuangan Sosial','Manage Keuangan Yatim'])){
                    $bendaharaPermissions[] = $permission; 
                 }
            }
        }
        // dd("super admin", $superAdminPermissions);
        // dd("sekretaris admin", $sekretarisPermissions);
        // dd($listPermission);

        Permission::insert($listPermission);
        
        $superAdmin = Role::create([
            'name'=> "SuperAdmin",
            'guard_name'=> 'web',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        $sekretaris = Role::create([
            'name'=> "Sekretaris",
            'guard_name'=> 'web',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        $bendahara = Role::create([
            'name'=> "Bendahara",
            'guard_name'=> 'web',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        $superAdmin->givePermissionTo($superAdminPermissions);
        $sekretaris->givePermissionTo($sekretarisPermissions);
        $bendahara->givePermissionTo($bendaharaPermissions);

        $userSuperAdmin = User::find(1)->assignRole("SuperAdmin");
    }
    
}
