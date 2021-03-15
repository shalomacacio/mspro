<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaCampanha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_campanha', function (Blueprint $table) {
            $table->unsignedInteger('agenda_id')->index();
            $table->foreign('agenda_id')->references('id')->on('agendas');

            $table->unsignedInteger('campanha_id')->index();
            $table->foreign('campanha_id')->references('id')->on('campanhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_campanha');
    }
}
