<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->string('nombre', 80);
            $table->uuid('id_servicio')->primary();
            $table->timestamps();
        });

        Schema::create('institucion', function (Blueprint $table) {
            $table->string('nombre', 80);
            $table->string('cif', 9)->primary();
            $table->string('direccion', 80);
            $table->integer('codigo_postal');
            $table->string('provincia', 50);
            $table->integer('telefono');
            $table->string('correo', 80);
            $table->string('poblacion', 50);
            $table->string('numero_cuenta_corriente', 20);
            $table->string('dni', 9);
            $table->timestamps();
        });

        Schema::create('comercial', function (Blueprint $table) {
            $table->uuid('id_comercial')->primary();
            $table->string('dni', 9)->unique();
            $table->timestamps();
        });

        Schema::create('asesoria_', function (Blueprint $table) {
            $table->uuid('id_asesoria')->unique();
            $table->string('cif', 9)->primary();
            $table->foreign('cif')->references('cif')->on('institucion')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('empresa', function (Blueprint $table) {
            $table->string('representante_legal', 80);
            $table->string('dni_representante_legal', 9);
            $table->string('sector', 80);
            $table->string('actividad', 80);
            $table->integer('cnae');
            $table->integer('numero_trabajadores');
            $table->uuid('id_empresa')->unique();
            $table->string('cif', 9)->primary();
            $table->foreign('cif')->references('cif')->on('institucion')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('consultoria_integral', function (Blueprint $table) {
            $table->uuid('id_consultoria_integral')->unique();
            $table->string('cif', 9)->primary();
            $table->foreign('cif')->references('cif')->on('institucion')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('trabajador', function (Blueprint $table) {
            $table->string('nombre', 80);
            $table->string('dni', 9)->primary();
            $table->string('direccion', 80);
            $table->integer('numero_telefono');
            $table->string('cif', 9);
            $table->foreign('cif')->references('cif')->on('consultoria_integral')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('administrativo', function (Blueprint $table) {
            $table->uuid('id_administrativo')->unique();
            $table->string('dni', 9)->primary();
            $table->foreign('dni')->references('dni')->on('trabajador')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('factura', function (Blueprint $table) {
            $table->integer('codigo_factura')->primary();
            $table->boolean('iva');
            $table->boolean('pagado');
            $table->boolean('irpf');
            $table->boolean('re');
            $table->boolean('rectificativa');
            $table->string('dni', 9);
            $table->foreign('dni')->references('dni')->on('administrativo')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contrato', function (Blueprint $table) {
            $table->uuid('id_contrato')->primary();
            $table->decimal('precio', 10, 2);
            $table->boolean('estado');
            $table->string('dni', 9);
            $table->foreign('dni')->references('dni')->on('administrativo')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contrato_multiple', function (Blueprint $table) {
            $table->timestamp('fecha_cobro');
            $table->uuid('id_contrato_multiple')->primary();
            $table->uuid('id_contrato');
            $table->foreign('id_contrato')->references('id_contrato')->on('contrato')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contrato_control_horario', function (Blueprint $table) {
            $table->uuid('id_contrato_control_horario')->primary();
            $table->uuid('id_contrato');
            $table->foreign('id_contrato')->references('id_contrato')->on('contrato')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('comunidad_propietarios', function (Blueprint $table) {
            $table->uuid('id_comunidad')->primary();
            $table->string('nombre_fiscal', 80);
            $table->string('cif', 9);
            $table->foreign('cif')->references('cif')->on('asesoria_')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('brinda', function (Blueprint $table) {
            $table->uuid('id_servicio');
            $table->string('cif', 9);
            $table->primary(['id_servicio', 'cif']);
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio')->onDelete('cascade');
            $table->foreign('cif')->references('cif')->on('consultoria_integral')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('contrata', function (Blueprint $table) {
            $table->timestamp('fecha');
            $table->uuid('id_servicio');
            $table->string('cif', 9);
            $table->primary(['id_servicio', 'cif']);
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio')->onDelete('cascade');
            $table->foreign('cif')->references('cif')->on('institucion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrata');
        Schema::dropIfExists('brinda');
        Schema::dropIfExists('comunidad_propietarios');
        Schema::dropIfExists('contrato_control_horario');
        Schema::dropIfExists('contrato_multiple');
        Schema::dropIfExists('contrato');
        Schema::dropIfExists('factura');
        Schema::dropIfExists('administrativo');
        Schema::dropIfExists('institucion', function (Blueprint $table) {
            $table->dropForeign(['dni']);
        });
        Schema::dropIfExists('comercial');
        Schema::dropIfExists('trabajador');
        Schema::dropIfExists('consultoria_integral');
        Schema::dropIfExists('empresa');
        Schema::dropIfExists('asesoria_');
        Schema::dropIfExists('institucion');
        Schema::dropIfExists('servicio');
    }
};
