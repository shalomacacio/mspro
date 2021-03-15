<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUbsTable.
 */
class CreateUbsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ubs', function(Blueprint $table) {
            $table->increments('id');
			$table->string('nome');
			$table->string('unidade')->nullable();
            $table->string('cnes', 7)->unique();
            $table->string('endereco')->nullable();
			$table->integer('bairro_id');
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
		Schema::drop('ubs');
	}
}
