<?php

namespace App\Http\Controllers;

use App\Entities\Agenda;
use App\Entities\Campanha;
use App\Entities\Paciente;
use App\Entities\Ubs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AgendaCreateRequest;
use App\Http\Requests\AgendaUpdateRequest;
use App\Repositories\AgendaRepository;
use App\Validators\AgendaValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class AgendasController.
 *
 * @package namespace App\Http\Controllers;
 */
class AgendasController extends Controller
{
    /**
     * @var AgendaRepository
     */
    protected $repository;

    /**
     * @var AgendaValidator
     */
    protected $validator;

    /**
     * AgendasController constructor.
     *
     * @param AgendaRepository $repository
     * @param AgendaValidator $validator
     */
    public function __construct(AgendaRepository $repository, AgendaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->middleware('checkagendado')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $campanhas = Campanha::all();
        $campanha_id = $request->campanha_id;

        if(!$campanha_id){
            $agendas = $this->repository->all();
        } else{
            $agendas = $this->repository->where('campanha_id', $campanha_id)->get();
        }
        

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $agendas,
            ]);
        }

        return view('admin.agendas.index', compact('agendas', 'campanhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AgendaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */

    public function store(AgendaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $agenda = $this->repository->create($request->all());

            $response = [
                'message' => 'Agendamento criado com sucesso.',
                'data'    => $agenda->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function agendarForm($pacienteId){
        $paciente = Paciente::find($pacienteId);
        $campanhas = DB::table('campanhas')->where('ativa', 1 )->get();
        return view('admin.agendas.agendarForm', compact('paciente', 'campanhas'));
    }

    public function selectCampanha(){
        $campanhas = DB::table('campanhas')->where('ativa', 1 )->get();
        return view('admin.agendas.select_campanha', compact('campanhas'));
    }


    public function agendarLoteForm(Request $request){

        $ubs = Ubs::all();
        $campanhas = Campanha::all();
        $campanha_id = $request->campanha_id;
        $agendados = Agenda::where('campanha_id', $campanha_id)->get()->pluck('paciente_id')->toArray();

        
        if(is_null ($request->ubs_id)){  
            $ubs_id = $ubs->pluck('id')->toArray(); 
        } else {
            $ubs_id = $request->ubs_id;    
        }

        if(is_null ($request->idade_min)){  
            $idade_min = 0;
        } else {
            $idade_min = $request->idade_min;  
        }

        if(is_null ($request->idade_max)){  
            $idade_max = 2000;
        } else {
            $idade_max = $request->idade_max;  
        }
       
        $result = DB::table('pacientes as p')
            ->join('ubs as u', 'p.ubs_id', 'u.id')
            ->whereNotIn('p.id', $agendados)
            ->whereIn('ubs_id', $ubs_id)
            ->selectRaw(' * ,p.id as id,  p.nome as nome, p.cpf, p.dt_nascimento , u.nome as ubs , YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(dt_nascimento))) AS idade')
            ->whereRaw("YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(dt_nascimento))) >='".$idade_min."' && YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(dt_nascimento))) <='".$idade_max."'")
            // ->whereRaw("")
            ->get();
    
        $pacientes = $result->sortBy('nome');

        return view('admin.agendas.agendarLoteForm', compact('pacientes', 'campanhas', 'ubs', 'request'));
    }


    public function agendarLote(AgendaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pacientes = $request->pacientes;
            $campanha_id = $request->campanha_id;
            $dh_agendamento = $request->dh_agendamento;
            $user_id = $request->user_id;

            foreach ($pacientes as  $paciente) {

                $agenda = new Agenda();
                $agenda->user_id = $user_id;
                $agenda->paciente_id = $paciente;
                $agenda->campanha_id = $campanha_id;
                $agenda->dh_agendamento = $dh_agendamento;
                $agenda->save();
            }

            $response = [
                'message' => 'Agendameno criado com sucesso.',
                'data'    => $agenda->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $agenda,
            ]);
        }

        return view('admin.agendas.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agenda = $this->repository->find($id);

        return view('admin.agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AgendaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AgendaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $agenda = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Agenda updated.',
                'data'    => $agenda->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Agenda deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Agenda deleted.');
    }
}
