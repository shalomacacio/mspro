<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateComunicadosTable.
 */
class CreateComunicadosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comunicados', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->string('titulo');
			$table->text('descricao');
			$table->datetime('dt_envio')->nullable();
			$table->datetime('dt_resposta')->nullable();
			$table->boolean('confirmado')->default(0);

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
		Schema::drop('comunicados');
	}
}
