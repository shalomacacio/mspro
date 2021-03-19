<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComorbidadePaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comorbidade_paciente', function (Blueprint $table) {
            $table->unsignedInteger('comorbidade_id')->index();
            $table->foreign('comorbidade_id')->references('id')->on('comorbidades');

            $table->unsignedBigInteger('paciente_id')->index();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comorbidade_paciente');
    }
}
