<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCampanhasTable.
 */
class CreateCampanhasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campanhas', function(Blueprint $table) {
            $table->increments('id');
			$table->string('titulo');
			$table->string('descricao')->nullable();
			$table->date('dt_inicio')->nullable();
			$table->date('dt_fim')->nullable();
			$table->boolean('ativa')->default(0);
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
		Schema::drop('campanhas');
	}
}
