<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrindaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brindas = [
            ['id_servicio' => 'bd0f58b5-792e-4d85-9941-f94983b3cb21', 'cif' => 'CIF111111'],
            ['id_servicio' => 'f8e5420b-2d0f-42b5-bb76-5eaa402a69ab', 'cif' => 'CIF111111'],
            ['id_servicio' => 'f8e5420b-2d0f-42b5-bb76-5eaa402a69ab', 'cif' => 'CIF111111'],
            ['id_servicio' => '5ff52a7a-d822-49b2-8e02-2821f7a9a92e', 'cif' => 'CIF222222'],
            ['id_servicio' => 'f8e5420b-2d0f-42b5-bb76-5eaa402a69ab', 'cif' => 'CIF222222'],
            ['id_servicio' => '6c69bb23-93ea-47fc-8de4-7d178c56b14b', 'cif' => 'CIF222222'],
        ];

        foreach ($brindas as $brinda) {
            DB::table('brinda')->updateOrInsert(
                ['id_servicio' => $brinda['id_servicio'], 'cif' => $brinda['cif']],
                [
                    'id_servicio' => $brinda['id_servicio'],
                    'cif' => $brinda['cif'],
                ]
            );
        }
    }
}
