<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTratamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_tratamiento', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('medico_id')->unsigned();
			$table->integer('tratamiento_id')->unsigned();
			$table->foreign('medico_id')->references('id')->on('medicos');
			$table->foreign('tratamiento_id')->references('id')->on('tratamientos');
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
        Schema::dropIfExists('medico_tratamiento');
    }
}
