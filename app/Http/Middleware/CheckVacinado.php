<?php

namespace App\Http\Middleware;

use App\Entities\Atendimento;
use Closure;

class CheckVacinado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $paciente_id = $request->paciente_id;
        $campanha_id = $request->campanha_id;
        $agenda = Atendimento::where('campanha_id', $campanha_id )->where('paciente_id', $paciente_id)->first();

        if(!$agenda){
            return $next($request);   
        }
        return redirect()->back()->with('message', 'Paciente já agendado para esta campanha');
      
    }
}
