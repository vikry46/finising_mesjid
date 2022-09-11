<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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


        foreach ($authorities as $label => $permission) {
            $listPermission[] = [
                'name'=> $permission,
                'guard'=> 'web',
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
        // dd("super admin", $superAdminPermissions);
        // dd("sekretaris admin", $sekretarisPermissions);
        dd($listPermission);
    }
    
}
