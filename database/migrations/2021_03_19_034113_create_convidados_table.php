<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConvidadosTable.
 */
class CreateConvidadosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convidados', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf',11)->unique();
            $table->string('celular', 11);
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
		Schema::drop('convidados');
	}
}
