<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunidadPropietariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comunidades = [
            ['id_comunidad' => 'a3a3b508-66f0-4e89-947f-08d19a16b816', 'nombre_fiscal' => 'Los Mares', 'cif' => 'CIF666666'],
            ['id_comunidad' => '8f9c14a1-2c14-4e0b-8b5b-ff5a5ecce536', 'nombre_fiscal' => 'Los Arcos', 'cif' => 'CIF666666'],
            ['id_comunidad' => 'cfb0c670-0c9e-4bb0-8b6d-6b193b71e300', 'nombre_fiscal' => 'El Paso', 'cif' => 'CIF666666'],
            ['id_comunidad' => 'fa2efb85-e138-41d3-84b5-1b0648b8ee93', 'nombre_fiscal' => 'EL bosque', 'cif' => 'CIF666666'],
            ['id_comunidad' => 'e18de58d-daf5-4e4c-81cc-aa1e853242c9', 'nombre_fiscal' => 'La Perla', 'cif' => 'CIF111111'],
            ['id_comunidad' => '94b055f6-14ad-4148-ba25-01f943e6c6a0', 'nombre_fiscal' => 'El Puente', 'cif' => 'CIF111111'],
        ];

        foreach ($comunidades as $comunidad) {
            DB::table('comunidad_propietarios')->updateOrInsert(
                ['id_comunidad' => $comunidad['id_comunidad']],
                [
                    'nombre_fiscal' => $comunidad['nombre_fiscal'],
                    'cif' => $comunidad['cif'],
                ]
            );
        }
    }
}
