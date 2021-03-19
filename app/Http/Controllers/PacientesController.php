<?php

namespace App\Http\Controllers;

use App\Entities\Agenda;
use App\Entities\Bairro;
use App\Entities\Campanha;
use App\Entities\Comorbidade;
use App\Entities\Paciente;
use App\Entities\Ubs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PacienteCreateRequest;
use App\Http\Requests\PacienteUpdateRequest;
use App\Repositories\PacienteRepository;
use App\Validators\PacienteValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class PacientesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PacientesController extends Controller
{
    /**
     * @var PacienteRepository
     */
    protected $repository;

    /**
     * @var PacienteValidator
     */
    protected $validator;

    /**
     * PacientesController constructor.
     *
     * @param PacienteRepository $repository
     * @param PacienteValidator $validator
     */
    public function __construct(PacienteRepository $repository, PacienteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $pacientes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pacientes,
            ]);
        }

        return view('admin.pacientes.index', compact('pacientes'));
    }

    public function create(){
        $bairros = Bairro::all();
        $comorbidades = Comorbidade::all();
        $ubs =  Ubs::all();
        return view('admin.pacientes.create', compact('bairros','comorbidades', 'ubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PacienteCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PacienteCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $paciente = $this->repository->create($request->all());

            $response = [
                'message' => 'Paciente created.',
                'data'    => $paciente->toArray(),
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
        $paciente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $paciente,
            ]);
        }

        return view('admin.pacientes.show', compact('paciente'));
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
        $paciente = $this->repository->find($id);
        $bairros = Bairro::all();
        $ubs = Ubs::all();
        $comorbidades = Comorbidade::all();
        

        return view('admin.pacientes.edit', compact('paciente', 'bairros', 'ubs', 'comorbidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PacienteUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PacienteUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $paciente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Paciente updated.',
                'data'    => $paciente->toArray(),
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
                'message' => 'Paciente deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Paciente deleted.');
    }

    public function search(Request $request){
        
        $filter = $request->filter;
        $value = $request->value;
        $pacientes = null;

        if($filter != null){
            if($filter == 'nome'){
                $pacientes = DB::table('pacientes')->where('nome','like', '%'.$value.'%')->get();
            } else {
                $pacientes = DB::table('pacientes')->where($filter,$value )->get();
            }
        }
    
        return view('admin.pacientes.search', compact('pacientes'));
    }

    public function agendamento(Request $request){
        $idade_min = $request->idade_min;
        $idade_max = $request->idade_max;

        $pacientes = null;
        $campanhas = DB::table('campanhas')->where('ativa', 1 )->get();

        $campanha_id = $request->campanha_id;
        $agenda = Agenda::where('campanha_id', $campanha_id)->get();

        if($agenda){
            $ja_agendados = $agenda->pluck('paciente_id')->toArray();
        }

        if($request != null){
            $pacientes = DB::table('pacientes as p')
            ->join('ubs as u', 'p.ubs_id', 'u.id')
            ->select('p.id', 'p.nome', 'p.cpf', 'p.cns','p.celular', 'p.dt_nascimento', 'u.nome as ubs')
            ->whereNotIN('p.id', $ja_agendados)
            ->get()
            ->sortBy('dt_nascimento');
        }
        return view('admin.pacientes.agendamento', compact('pacientes', 'campanhas', 'idade_min', 'idade_max', 'campanha_id'));
    }

}
