<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAtendimentosTable.
 */
class CreateAtendimentosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atendimentos', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('paciente_id');
			$table->integer('vacina_id')->nullable();
			$table->integer('agenda_id')->nullable();
			$table->char('concluido')->default('S');
			$table->text('obs')->nullable();
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
		Schema::drop('atendimentos');
	}
}
