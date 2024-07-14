<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = [
            [
                'representante_legal' => 'Juan Pablo',
                'dni_representante_legal' => '123456789',
                'sector' => 'Limpieza',
                'actividad' => 'Limpieza',
                'cnae' => 12345,
                'numero_trabajadores' => 10,
                'id_empresa' => 'a92a46ff-c0f2-4381-876a-7dc2769b30f5',
                'cif' => 'CIF555555',
            ],
            [
                'representante_legal' => 'David',
                'dni_representante_legal' => '987654321',
                'sector' => 'Veterinaria',
                'actividad' => 'Veterinaria',
                'cnae' => 67890,
                'numero_trabajadores' => 20,
                'id_empresa' => '231c86e9-b1c4-4f02-b0eb-4823b21b0c23',
                'cif' => 'CIF666666',
            ],
            [
                'representante_legal' => 'Laura',
                'dni_representante_legal' => 'ABCDEF12',
                'sector' => 'Hosteleria',
                'actividad' => 'Hosteleria',
                'cnae' => 34567,
                'numero_trabajadores' => 15,
                'id_empresa' => '48586cfd-5d70-4f39-92c7-6d5baffcc81d',
                'cif' => 'CIF777777',
            ],
        ];

        foreach ($empresas as $empresa) {
            DB::table('empresa')->updateOrInsert(
                ['cif' => $empresa['cif']],
                [
                    'representante_legal' => $empresa['representante_legal'],
                    'dni_representante_legal' => $empresa['dni_representante_legal'],
                    'sector' => $empresa['sector'],
                    'actividad' => $empresa['actividad'],
                    'cnae' => $empresa['cnae'],
                    'numero_trabajadores' => $empresa['numero_trabajadores'],
                    'id_empresa' => $empresa['id_empresa'],
                ]
            );
        }
    }
}
