<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComercialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comerciales = [
            [
                'id_comercial' => \Illuminate\Support\Str::uuid(),
                'dni' => '43695125J',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_comercial' => \Illuminate\Support\Str::uuid(),
                'dni' => '43695125C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($comerciales as $comercial) {
            DB::table('comercial')->updateOrInsert(
                ['dni' => $comercial['dni']],
                $comercial
            );
        }
    }
}
