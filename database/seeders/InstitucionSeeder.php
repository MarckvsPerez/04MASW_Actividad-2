<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituciones = [
            [
                'nombre' => 'Consulrotia Integral Mellado',
                'cif' => 'CIF111111',
                'direccion' => 'calle vistamar 37',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661785436,
                'correo' => 'mellado@institucion.com',
                'poblacion' => 'Vila-seca',
                'numero_cuenta_corriente' => 'ES364259784120569813',
                'dni' => '43695125J',
            ],
            [
                'nombre' => 'Consulrotia Integral Elite',
                'cif' => 'CIF222222',
                'direccion' => 'calle salt 27',
                'codigo_postal' => 43480,
                'provincia' => 'Sevilla',
                'telefono' => 661246387,
                'correo' => 'elite@institucion.com',
                'poblacion' => 'Dos hermanas',
                'numero_cuenta_corriente' => 'ES264892547234615982',
                'dni' => '43695125J',
            ],
            [
                'nombre' => 'Asesoria Hipercomunidad',
                'cif' => 'CIF333333',
                'direccion' => 'calle ferro 50',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661264189,
                'correo' => 'hipercomunidad@institucion.com',
                'poblacion' => 'Reus',
                'numero_cuenta_corriente' => 'ES963852147456123789',
                'dni' => '43695125C',
            ],
            [
                'nombre' => 'Asesoria Andy',
                'cif' => 'CIF444444',
                'direccion' => 'calle salto 63',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661264170,
                'correo' => 'andy@institucion.com',
                'poblacion' => 'Salou',
                'numero_cuenta_corriente' => 'ES123425617894256132',
                'dni' => '43695125C',
            ],
            [
                'nombre' => 'Limpieza SL',
                'cif' => 'CIF555555',
                'direccion' => 'calle cielo 23',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661264171,
                'correo' => 'limpieza@institucion.com',
                'poblacion' => 'Reus',
                'numero_cuenta_corriente' => 'ES123425617894256151',
                'dni' => '43695125C',
            ],
            [
                'nombre' => 'Mascotas SL',
                'cif' => 'CIF666666',
                'direccion' => 'calle sol 13',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661264172,
                'correo' => 'mascotas@institucion.com',
                'poblacion' => 'Reus',
                'numero_cuenta_corriente' => 'ES123425617894256151',
                'dni' => '43695125C',
            ],
            [
                'nombre' => 'Bar Encuentro',
                'cif' => 'CIF777777',
                'direccion' => 'calle luna 43',
                'codigo_postal' => 43480,
                'provincia' => 'Tarragona',
                'telefono' => 661264122,
                'correo' => 'encuentro@institucion.com',
                'poblacion' => 'La selva',
                'numero_cuenta_corriente' => 'ES145425617894256151',
                'dni' => '43695125C',
            ],
        ];

        foreach ($instituciones as $institucion) {
            DB::table('institucion')->updateOrInsert(
                ['cif' => $institucion['cif']],
                [
                    'nombre' => $institucion['nombre'],
                    'direccion' => $institucion['direccion'],
                    'codigo_postal' => $institucion['codigo_postal'],
                    'provincia' => $institucion['provincia'],
                    'telefono' => $institucion['telefono'],
                    'correo' => $institucion['correo'],
                    'poblacion' => $institucion['poblacion'],
                    'numero_cuenta_corriente' => $institucion['numero_cuenta_corriente'],
                    'dni' => $institucion['dni'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
