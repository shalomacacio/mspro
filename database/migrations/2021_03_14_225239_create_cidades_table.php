<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCidadesTable.
 */
class CreateCidadesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cidades', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('uf_id');
			$table->string('nome');
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
		Schema::drop('cidades');
	}
}
