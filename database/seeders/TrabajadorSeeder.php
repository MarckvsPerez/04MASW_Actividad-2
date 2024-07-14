<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trabajadores = [
            [
                'nombre' => 'Sergio',
                'dni' => '43695125J',
                'direccion' => 'calle mar 12',
                'numero_telefono' => '663451689',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Aldana',
                'dni' => '43695125M',
                'direccion' => 'calle luz 18',
                'numero_telefono' => '663451642',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Guido',
                'dni' => '43695125K',
                'direccion' => 'calle paz 86',
                'numero_telefono' => '663451642',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Victoria',
                'dni' => '43695125C',
                'direccion' => 'calle vegas 30',
                'numero_telefono' => '663451612',
                'cif' => 'CIF222222',
            ],
            [
                'nombre' => 'Haymee',
                'dni' => '43695125Z',
                'direccion' => 'calle alegre 14',
                'numero_telefono' => '666351612',
                'cif' => 'CIF222222',
            ],
            [
                'nombre' => 'Rigo',
                'dni' => '43695125X',
                'direccion' => 'calle miami 14',
                'numero_telefono' => '666351272',
                'cif' => 'CIF222222',
            ],
        ];

        foreach ($trabajadores as $trabajador) {
            DB::table('trabajador')->updateOrInsert(
                ['dni' => $trabajador['dni']],
                [
                    'nombre' => $trabajador['nombre'],
                    'direccion' => $trabajador['direccion'],
                    'numero_telefono' => $trabajador['numero_telefono'],
                    'cif' => $trabajador['cif'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
