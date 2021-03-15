<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePacientesTable.
 */
class CreatePacientesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table) {
            $table->id();
			
			//Dados Pessoais
			$table->unsignedBigInteger('cns')->nullable(); 	//cartao nacional de saude 
			$table->string('nome');
            $table->string('nome_mae')->nullable();
            $table->string('cpf', 11)->unique();
			$table->date('dt_nascimento');
			$table->char('sexo', 1);
			
			//Contato
			$table->string('celular', 11);
            $table->string('email')->nullable();
            
			//Endereço
            $table->string('cep', 8)->nullable();
			$table->unsignedInteger('uf_id')->nullable();
			$table->unsignedInteger('cidade_id')->nullable();
			$table->unsignedInteger('bairro_id')->nullable();
			$table->string('rua', 120)->nullable();
			$table->string('num', 8)->nullable();
			$table->string('comp', 50)->nullable();

			$table->longText('obs')->nullable();

			//Dados hospitalares
			$table->unsignedInteger('ubs_id');	//unidade basica de saude
			$table->string('agente_saude')->nullable();	//agente de saude
			
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
		Schema::drop('pacientes');
	}
}
