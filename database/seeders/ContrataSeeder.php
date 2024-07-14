<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContrataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contratas = [
            ['fecha' => '2024-05-12 12:00:00', 'id_servicio' => 'bd0f58b5-792e-4d85-9941-f94983b3cb21', 'cif' => 'CIF555555'],
            ['fecha' => '2024-05-12 12:00:00', 'id_servicio' => 'f8e5420b-2d0f-42b5-bb76-5eaa402a69ab', 'cif' => 'CIF666666'],
            ['fecha' => '2024-05-12 12:00:00', 'id_servicio' => 'd79f6c97-4aa1-4cfb-8632-b90d2f6b75a0', 'cif' => 'CIF777777'],
        ];

        foreach ($contratas as $contrata) {
            DB::table('contrata')->updateOrInsert(
                ['id_servicio' => $contrata['id_servicio'], 'cif' => $contrata['cif']],
                [
                    'fecha' => $contrata['fecha'],
                    'id_servicio' => $contrata['id_servicio'],
                    'cif' => $contrata['cif'],
                ]
            );
        }
    }
}
