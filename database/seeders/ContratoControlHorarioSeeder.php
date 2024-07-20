<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContratoControlHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contratos_control_horarios = [
            ['id_contrato_control_horario' => '8f8fd615-1f1b-4203-aacb-39048d5885a4', 'id_contrato' => '3f542084-222e-4b30-ae82-b7f4b10f0ed2'],
            ['id_contrato_control_horario' => 'c49f3fd2-6110-4519-bc17-e7deef2aa4ff', 'id_contrato' => '50451a7c-6b46-4ae3-a408-0e848040e4a9'],
            ['id_contrato_control_horario' => 'e8a6b8f0-6599-4eaa-8d23-3b1e31f801d7', 'id_contrato' => '7f37de02-d20c-42e9-b7a9-4cb7bfe83aa7'],
        ];

        foreach ($contratos_control_horarios as $contrato_control_horario) {
            $now = Carbon::now();
            DB::table('contrato_control_horario')->updateOrInsert(
                ['id_contrato_control_horario' => $contrato_control_horario['id_contrato_control_horario']],
                [
                    'id_contrato' => $contrato_control_horario['id_contrato'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            );
        }
    }
}
