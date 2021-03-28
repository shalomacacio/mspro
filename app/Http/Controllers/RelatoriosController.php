<?php

namespace App\Http\Controllers;

use App\Entities\Campanha;
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


    public function campanhas(Request $request){

        $campanhas = Campanha::all();

        if(!$request->campanha_id){
            $campanhas_id = $campanhas->where('ativa', 1)->pluck('id')->toArray();
        } else{
            $campanhas_id = $request->campanha_id;
        }
        
        $agendas = DB::table('agendas as a')
                    ->join('pacientes as p', 'a.paciente_id', 'p.id' )
                    ->join('campanhas as c', 'a.campanha_id', 'c.id' )
                    ->leftJoin('bairros as b', 'p.bairro_id', 'b.id' )
                    ->join('ubs as u', 'p.ubs_id', 'u.id' )
                    ->whereIn('a.campanha_id', $campanhas_id)
                    ->select('a.id','c.titulo', 'a.dh_agendamento','u.nome as ubs', 'b.nome as bairro', 'p.*')
                    ->get();
        
        return view('admin.relatorios.campanhas', compact('campanhas', 'agendas'));
    }
}
