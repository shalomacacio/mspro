<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{
    public function pacientes(){
        $pacientes = DB::table('pacientes as p')
        ->leftJoin('bairros as b', 'p.bairro_id', 'b.id')
        ->leftJoin('ubs as u', 'p.ubs_id', 'u.id')
        ->select('p.id', 'p.nome', 'p.sexo' ,'p.cpf', 'p.dt_nascimento', 'p.cns', 'p.rua', 'p.num','b.nome as bairro', 'u.nome as ubs', 'p.celular', 'p.agente_saude')
        ->get()
        ->sortBy('nome');
        return view('admin.relatorios.pacientes', compact('pacientes'));
    }
}
