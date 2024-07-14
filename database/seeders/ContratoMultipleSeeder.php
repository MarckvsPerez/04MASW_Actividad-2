<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoMultipleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contratos_multiples = [
            ['fecha_cobro' => '2024-05-12 12:00:00', 'id_contrato_multiple' => 'cd7732cf-b479-4184-bd88-48349dbd1e9b', 'id_contrato' => '3f542084-222e-4b30-ae82-b7f4b10f0ed2'],
            ['fecha_cobro' => '2024-05-12 12:00:00', 'id_contrato_multiple' => 'ee5c601b-f029-496e-9c44-a09bbe1ed0ac', 'id_contrato' => '50451a7c-6b46-4ae3-a408-0e848040e4a9'],
        ];

        foreach ($contratos_multiples as $contrato_multiple) {
            DB::table('contrato_multiple')->updateOrInsert(
                ['id_contrato_multiple' => $contrato_multiple['id_contrato_multiple']],
                [
                    'fecha_cobro' => $contrato_multiple['fecha_cobro'],
                    'id_contrato' => $contrato_multiple['id_contrato'],
                ]
            );
        }
    }
}
