<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('surname', 100)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('dni', 9)->nullable()->unique();
            $table->string('estado', 15)->nullable();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 500)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('telefono', 9)->nullable();
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
        Schema::dropIfExists('propietarios');
    }
}
