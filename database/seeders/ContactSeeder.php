<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (\DB::table('contacts')->get()->count() == 0) {
            \DB::table('contacts')->insert([
                'address' => 'Jl. Mitra Praja No.9, Banjarbaru',
                'email' => 'admin@dispupr.banjarbarukota.go.id',
                'phone_number' => '(0511) 5931688',
                'working_hours' => "Senin - Kamis: 08.00 - 16.30 WITA <br>
                Jum'at: 09.00 - 16.30 WITA",
            ]);
        }
    }
}
