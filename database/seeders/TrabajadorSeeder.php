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
                'nombre' => 'Frodo',
                'dni' => '43695125J',
                'direccion' => 'Shire 12',
                'numero_telefono' => '663451689',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Gandalf',
                'dni' => '43695125M',
                'direccion' => 'Middle Earth 18',
                'numero_telefono' => '663451642',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Aragorn',
                'dni' => '43695125K',
                'direccion' => 'Gondor 86',
                'numero_telefono' => '663451642',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Legolas',
                'dni' => '43695125C',
                'direccion' => 'Mirkwood 30',
                'numero_telefono' => '663451612',
                'cif' => 'CIF222222',
            ],
            [
                'nombre' => 'Gimli',
                'dni' => '43695125Z',
                'direccion' => 'Lonely Mountain 14',
                'numero_telefono' => '666351612',
                'cif' => 'CIF222222',
            ],
            [
                'nombre' => 'Sauron',
                'dni' => '43695125X',
                'direccion' => 'Mordor 14',
                'numero_telefono' => '666351272',
                'cif' => 'CIF222222',
            ],
            [
                'nombre' => 'Harry',
                'dni' => '43695125L',
                'direccion' => 'Privet Drive 5',
                'numero_telefono' => '666351273',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Hermione',
                'dni' => '43695125Y',
                'direccion' => 'Hogwarts 8',
                'numero_telefono' => '666351274',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Ron',
                'dni' => '43695125W',
                'direccion' => 'The Burrow 3',
                'numero_telefono' => '666351275',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Voldemort',
                'dni' => '43695125Q',
                'direccion' => 'Riddle House 7',
                'numero_telefono' => '666351276',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Dumbledore',
                'dni' => '43695125E',
                'direccion' => 'Hogwarts 10',
                'numero_telefono' => '666351277',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Snape',
                'dni' => '43695125R',
                'direccion' => 'Spinner s End 12',
                'numero_telefono' => '666351278',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Luke',
                'dni' => '43695125T',
                'direccion' => 'Tatooine 22',
                'numero_telefono' => '666351279',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Leia',
                'dni' => '43695125U',
                'direccion' => 'Alderaan 25',
                'numero_telefono' => '666351280',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Han',
                'dni' => '43695125I',
                'direccion' => 'Millennium Falcon 27',
                'numero_telefono' => '666351281',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Yoda',
                'dni' => '43695125O',
                'direccion' => 'Dagobah 30',
                'numero_telefono' => '666351282',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Anakin',
                'dni' => '43695125P',
                'direccion' => 'Naboo 32',
                'numero_telefono' => '666351283',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Obi-Wan',
                'dni' => '43695125A',
                'direccion' => 'Tatooine 35',
                'numero_telefono' => '666351284',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Thanos',
                'dni' => '43695125S',
                'direccion' => 'Titan 38',
                'numero_telefono' => '666351285',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Iron Man',
                'dni' => '43695125D',
                'direccion' => 'Stark Tower 40',
                'numero_telefono' => '666351286',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Thor',
                'dni' => '43695125F',
                'direccion' => 'Asgard 45',
                'numero_telefono' => '666351287',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Hulk',
                'dni' => '43695125G',
                'direccion' => 'Avengers HQ 50',
                'numero_telefono' => '666351288',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Black Widow',
                'dni' => '43695125H',
                'direccion' => 'Avengers HQ 55',
                'numero_telefono' => '666351289',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Spider-Man',
                'dni' => '43695125B',
                'direccion' => 'Queens 60',
                'numero_telefono' => '666351290',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Wonder Woman',
                'dni' => '43695125N',
                'direccion' => 'Themyscira 65',
                'numero_telefono' => '666351291',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Batman',
                'dni' => '43695125V',
                'direccion' => 'Gotham 70',
                'numero_telefono' => '666351292',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Superman',
                'dni' => '43695125U',
                'direccion' => 'Metropolis 75',
                'numero_telefono' => '666351293',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Joker',
                'dni' => '43695125E',
                'direccion' => 'Arkham Asylum 80',
                'numero_telefono' => '666351294',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Harley Quinn',
                'dni' => '43695125W',
                'direccion' => 'Gotham 85',
                'numero_telefono' => '666351295',
                'cif' => 'CIF111111',
            ],
            [
                'nombre' => 'Flash',
                'dni' => '43695125Q',
                'direccion' => 'Central City 90',
                'numero_telefono' => '666351296',
                'cif' => 'CIF111111',
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
