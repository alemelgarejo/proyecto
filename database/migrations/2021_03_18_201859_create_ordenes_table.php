<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable();
            $table->date('fecha');
            $table->string('ciudad', 40)->nullable();
            $table->string('tipo_orden', 100)->nullable();
            $table->string('tipo_propiedad', 100)->nullable();
            $table->float('precio_minimo', 40)->nullable();
            $table->float('precio_maximo', 40)->nullable();
            $table->float('superficie_minima', 40)->nullable();
            $table->float('superficie_maxima', 40)->nullable();
            $table->integer('dormitorios_minimo', false, true, 40)->nullable();
            $table->integer('dormitorios_maximo', false, true, 40)->nullable();
            $table->string('planta', 40)->nullable();
            $table->string('numero_maximo_plantas', 40)->nullable();
            $table->boolean('amueblado')->nullable();
            $table->boolean('ascensor')->nullable();
            $table->boolean('garaje')->nullable();
            $table->boolean('terraza')->nullable();
            $table->boolean('patio')->nullable();
            $table->boolean('calefaccion')->nullable();
            $table->boolean('aire_acondicionado')->nullable();
            $table->boolean('piscina')->nullable();
            $table->boolean('jardin')->nullable();
            $table->boolean('acceso_minusvalidos')->nullable();
            $table->string('situacion', 100)->nullable();
            $table->string('estado_conservacion', 100)->nullable();
            $table->boolean('necesita_prestamo')->nullable();
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('ordenes');
    }
}
