<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBairrosTable.
 */
class CreateBairrosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bairros', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('cidade_id');
			$table->string('nome');
			$table->string('descricao')->nullable();
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
		Schema::drop('bairros');
	}
}
