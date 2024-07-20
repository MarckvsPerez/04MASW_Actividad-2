<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facturas = [
            ['codigo_factura' => '001', 'iva' => true, 'pagado' => false, 'irpf' => false, 're' => false, 'rectificativa' => false, 'dni' => '43695125M'],
            ['codigo_factura' => '002', 'iva' => true, 'pagado' => true, 'irpf' => false, 're' => false, 'rectificativa' => false, 'dni' => '43695125M'],
            ['codigo_factura' => '003', 'iva' => true, 'pagado' => false, 'irpf' => false, 're' => false, 'rectificativa' => false, 'dni' => '43695125M'],
            ['codigo_factura' => '004', 'iva' => true, 'pagado' => true, 'irpf' => false, 're' => false, 'rectificativa' => false, 'dni' => '43695125K'],
            ['codigo_factura' => '005', 'iva' => true, 'pagado' => false, 'irpf' => false, 're' => false, 'rectificativa' => true, 'dni' => '43695125Z'],
            ['codigo_factura' => '006', 'iva' => true, 'pagado' => false, 'irpf' => false, 're' => false, 'rectificativa' => false, 'dni' => '43695125Z'],
        ];

        foreach ($facturas as $factura) {
            $now = Carbon::now();
            DB::table('factura')->updateOrInsert(
                ['codigo_factura' => $factura['codigo_factura']],
                [
                    'iva' => $factura['iva'],
                    'pagado' => $factura['pagado'],
                    'irpf' => $factura['irpf'],
                    're' => $factura['re'],
                    'rectificativa' => $factura['rectificativa'],
                    'dni' => $factura['dni'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]
            );
        }
    }
}
