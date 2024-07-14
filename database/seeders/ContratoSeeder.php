<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contratos = [
            ['id_contrato' => '3f542084-222e-4b30-ae82-b7f4b10f0ed2', 'precio' => 150.00, 'estado' => true, 'dni' => '43695125M'],
            ['id_contrato' => '50451a7c-6b46-4ae3-a408-0e848040e4a9', 'precio' => 200.00, 'estado' => true, 'dni' => '43695125M'],
            ['id_contrato' => '7f37de02-d20c-42e9-b7a9-4cb7bfe83aa7', 'precio' => 170.00, 'estado' => true, 'dni' => '43695125M'],
            ['id_contrato' => '8cbe7480-9e7d-41b1-af53-2cb9e0655d91', 'precio' => 110.00, 'estado' => true, 'dni' => '43695125K'],
            ['id_contrato' => 'd24a255b-2b58-49e0-9db3-df4f7cd4a97a', 'precio' => 180.00, 'estado' => false, 'dni' => '43695125Z'],
            ['id_contrato' => '2a958010-e8ff-4a85-8a1b-7e892b0dca48', 'precio' => 150.00, 'estado' => false, 'dni' => '43695125Z'],
        ];

        foreach ($contratos as $contrato) {
            DB::table('contrato')->updateOrInsert(
                ['id_contrato' => $contrato['id_contrato']],
                [
                    'precio' => $contrato['precio'],
                    'estado' => $contrato['estado'],
                    'dni' => $contrato['dni'],
                ]
            );
        }
    }
}
