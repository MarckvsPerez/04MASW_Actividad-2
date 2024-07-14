<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultoriaIntegralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consultoria_integral')->updateOrInsert(
            ['cif' => 'CIF111111'],
            ['id_consultoria_integral' => 'e2ef4bb1-1d26-4044-bdb1-305f39d84c20', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('consultoria_integral')->updateOrInsert(
            ['cif' => 'CIF222222'],
            ['id_consultoria_integral' => 'e19b2137-6ed2-4dbd-8711-31408fd110db', 'created_at' => now(), 'updated_at' => now()]
        );
    }
}
