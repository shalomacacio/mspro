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
        $agenda_id = $request->agenda_id;
        $atendimento = Atendimento::where('agenda_id', $agenda_id )
                    ->where('paciente_id', $paciente_id)
                    ->where('concluido', 'S')
                    ->first();

        if(!$atendimento){
            return $next($request);   
        }
        return redirect()->back()->with('message', 'Paciente já Vacinado nesta Campanha');
      
    }
}
