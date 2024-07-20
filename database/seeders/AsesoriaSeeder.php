<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsesoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asesorias = [
            ['id_asesoria' => '7518f0fc-104a-4d70-a34f-35b2ff24a4a1', 'cif' => 'CIF111111'],
            ['id_asesoria' => 'd3fd2870-cf3e-4654-8184-4fd1091dd54c', 'cif' => 'CIF666666'],
        ];

        foreach ($asesorias as $asesoria) {
            $now = Carbon::now();
            DB::table('asesoria_')->updateOrInsert(
                ['cif' => $asesoria['cif']],
                [
                    'id_asesoria' => $asesoria['id_asesoria'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            );
        }
    }
}
