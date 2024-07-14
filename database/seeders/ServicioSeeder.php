<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Implantación LOPD', 'id_servicio' => 'bd0f58b5-792e-4d85-9941-f94983b3cb21'],
            ['nombre' => 'Mantenimiento LOPD', 'id_servicio' => 'f8e5420b-2d0f-42b5-bb76-5eaa402a69ab'],
            ['nombre' => 'Implantación protocolo de acoso', 'id_servicio' => 'd79f6c97-4aa1-4cfb-8632-b90d2f6b75a0'],
            ['nombre' => 'Mantenimiento protocolo de acoso', 'id_servicio' => '5ff52a7a-d822-49b2-8e02-2821f7a9a92e'],
            ['nombre' => 'LICIE', 'id_servicio' => '6c69bb23-93ea-47fc-8de4-7d178c56b14b'],
        ];

        foreach ($servicios as $servicio) {
            DB::table('servicio')->updateOrInsert(
                ['id_servicio' => $servicio['id_servicio']],
                [
                    'nombre' => $servicio['nombre'],
                ]
            );
        }
    }
}
