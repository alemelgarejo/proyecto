<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propietario_id')->nullable();
            $table->string('estado', 100);
            $table->float('valoracion', 100)->nullable();
            $table->string('tipo', 40)->nullable();
            $table->string('tipo_interes', 255)->nullable();
            $table->string('direccion', 500)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->float('superficie', 40)->nullable();
            $table->float('superficie_construida', 40)->nullable();
            $table->integer('numero_dormitorios', false, true, 40)->nullable();
            $table->integer('numero_aseos', false, true, 40)->nullable();
            $table->boolean('armarios_empotrados')->nullable();
            $table->integer('numero_salones', false, true, 40)->nullable();
            $table->float('superficie_salones', 40)->nullable();
            $table->boolean('amueblado')->nullable();
            $table->boolean('comedor_independiente')->nullable();
            $table->float('superficie_comedor', 40)->nullable();
            $table->boolean('cocina_amueblada')->nullable();
            $table->string('tipo_cocina', 50)->nullable();
            $table->integer('terrazas', false, true, 5)->nullable();
            $table->float('superficie_terrazas', 40)->nullable();
            $table->boolean('balcon')->nullable();
            $table->float('superficie_balcon', 40)->nullable();
            $table->boolean('patio')->nullable();
            $table->float('superficie_patio', 40)->nullable();
            $table->string('ubicacion_patio', 40)->nullable();
            $table->string('situacion', 40)->nullable();
            $table->float('altura_techo', 40)->nullable();
            $table->boolean('garaje')->nullable();
            $table->float('superficie_garaje', 40)->nullable();
            $table->boolean('trastero')->nullable();
            $table->float('superficie_trastero', 40)->nullable();
            $table->boolean('sotano')->nullable();
            $table->float('superficie_sotano', 40)->nullable();
            $table->boolean('calefaccion')->nullable();
            $table->string('tipo_calefaccion', 40)->nullable();
            $table->boolean('aire_acondicionado')->nullable();
            $table->string('tipo_aire_acondicionado', 40)->nullable();
            $table->string('tipo_edificio', 40)->nullable();
            $table->integer('numero_plantas', false, true, 5)->nullable();
            $table->integer('planta', false, true, 5)->nullable();
            $table->boolean('ascensor')->nullable();
            $table->boolean('urbanizacion')->nullable();
            $table->boolean('jardin')->nullable();
            $table->float('superficie_jardin', 40)->nullable();
            $table->date('fecha_construccion')->nullable();
            $table->string('estado_conservacion', 40)->nullable();
            $table->string('latitud', 40)->nullable();
            $table->string('longitud', 40)->nullable();
            $table->string('google_maps', 40)->nullable();
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
        Schema::dropIfExists('propiedades');
    }
}
