<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $administrativos = [
            ['id_administrativo' => Str::uuid(), 'dni' => '43695125M', 'created_at' => $now, 'updated_at' => $now],
            ['id_administrativo' => Str::uuid(), 'dni' => '43695125K', 'created_at' => $now, 'updated_at' => $now],
            ['id_administrativo' => Str::uuid(), 'dni' => '43695125Z', 'created_at' => $now, 'updated_at' => $now],
            ['id_administrativo' => Str::uuid(), 'dni' => '43695125X', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('administrativo')->insert($administrativos);
    }
}
