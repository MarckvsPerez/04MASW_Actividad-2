<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrativos = [
            ['id_administrativo' => 'c45c71f3-7cf4-42d0-99db-91cc5c18a4c5', 'dni' => '43695125M'],
            ['id_administrativo' => '66bc62e3-5fa5-437d-bd54-d11b2de8553d', 'dni' => '43695125K'],
            ['id_administrativo' => 'dfe35c6b-3a14-4a8c-a3c0-364eaf5b4c86', 'dni' => '43695125Z'],
            ['id_administrativo' => '9c7a4bae-99ff-46ac-b85f-5ed504ad8330', 'dni' => '43695125X'],
        ];

        foreach ($administrativos as $administrativo) {
            DB::table('administrativo')->updateOrInsert(
                ['dni' => $administrativo['dni']],
                $administrativo
            );
        }
    }
}
