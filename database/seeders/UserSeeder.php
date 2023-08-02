<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->truncate();
        \DB::table('roles')->truncate();

        $superadmin = User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'super@admin.com',
            'password' => bcrypt('123456')
        ]);

        $adminsekretariat = User::factory()->create([
            'name' => 'Admin Bidang Sekretariat',
            'username' => 'sekretariat',
            'email' => 'sekretariat@admin.com',
            'password' => bcrypt('123456')
        ]);

        $adminbinamarga = User::factory()->create([
            'name' => 'Admin Bidang Bina Marga',
            'username' => 'binamarga',
            'email' => 'binamarga@admin.com',
            'password' => bcrypt('123456')
        ]);

        $admintataruang = User::factory()->create([
            'name' => 'Admin Bidang Tata Ruang',
            'username' => 'tataruang',
            'email' => 'tataruang@admin.com',
            'password' => bcrypt('123456')
        ]);

        $adminciptakarya = User::factory()->create([
            'name' => 'Admin Bidang Cipta Karya',
            'username' => 'ciptakarya',
            'email' => 'ciptakarya@admin.com',
            'password' => bcrypt('123456')
        ]);

        $adminkonstruksi = User::factory()->create([
            'name' => 'Admin Bidang Pengembangan Konstruksi',
            'username' => 'konstruksi',
            'email' => 'konstruksi@admin.com',
            'password' => bcrypt('123456')
        ]);

        $adminsda = User::factory()->create([
            'name' => 'Admin Bidang Sumber Daya Air',
            'username' => 'sumberdayaair',
            'email' => 'sda@admin.com',
            'password' => bcrypt('123456')
        ]);

        $rolesuperadmin = Role::create(['name' => 'Super Admin']);
        $roleadminbidang = Role::create(['name' => 'Admin Bidang']);

        $superadmin->assignRole($rolesuperadmin);
        $adminsekretariat->assignRole($roleadminbidang);
        $adminbinamarga->assignRole($roleadminbidang);
        $admintataruang->assignRole($roleadminbidang);
        $adminciptakarya->assignRole($roleadminbidang);
        $adminkonstruksi->assignRole($roleadminbidang);
        $adminsda->assignRole($roleadminbidang);
    }
}
