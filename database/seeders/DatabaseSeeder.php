<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // Usa una contraseña fuerte
            ]
        );

        $this->call([
            ServicioSeeder::class,
            ComercialSeeder::class,
            InstitucionSeeder::class,
            ConsultoriaIntegralSeeder::class,
            TrabajadorSeeder::class,
            AsesoriaSeeder::class,
            EmpresaSeeder::class,
            AdministrativoSeeder::class,
            FacturaSeeder::class,
            ContratoSeeder::class,
            ContratoMultipleSeeder::class,
            ContratoControlHorarioSeeder::class,
            ComunidadPropietariosSeeder::class,
            BrindaSeeder::class,

            ContrataSeeder::class,
        ]);
    }
}
