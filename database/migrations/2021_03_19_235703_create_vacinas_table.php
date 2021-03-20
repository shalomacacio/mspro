<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVacinasTable.
 */
class CreateVacinasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vacinas', function(Blueprint $table) {
            $table->increments('id');
			$table->string('nome');
			$table->string('descricao')->nullable();
			$table->string('lote')->nullable();
			$table->date('validade')->nullable();
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
		Schema::drop('vacinas');
	}
}
