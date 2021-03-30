<?php

namespace App\Http\Controllers;

use App\Entities\Agenda;
use App\Entities\Paciente;
use App\Entities\Vacina;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AtendimentoCreateRequest;
use App\Http\Requests\AtendimentoUpdateRequest;
use App\Repositories\AtendimentoRepository;
use App\Validators\AtendimentoValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class AtendimentosController.
 *
 * @package namespace App\Http\Controllers;
 */
class AtendimentosController extends Controller
{
    /**
     * @var AtendimentoRepository
     */
    protected $repository;

    /**
     * @var AtendimentoValidator
     */
    protected $validator;

    /**
     * AtendimentosController constructor.
     *
     * @param AtendimentoRepository $repository
     * @param AtendimentoValidator $validator
     */
    public function __construct(AtendimentoRepository $repository, AtendimentoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->middleware('checkvacinado')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $atendimentos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atendimentos,
            ]);
        }

        return view('admin.atendimentos.index', compact('atendimentos'));
    }

    public function create($paciente_id){
        $vacinas = Vacina::all();
        $paciente = Paciente::find($paciente_id );
        $agendas = Agenda::where('paciente_id', $paciente_id )->get();
        return view('admin.atendimentos.create', compact('paciente','agendas' ,'vacinas'));
    }

    public function selectCampanha(){
        $campanhas = DB::table('campanhas')->where('ativa', 1 )->get();
        return view('admin.atendimentos.select_campanha', compact('campanhas'));
    }

    public function atenderLotForm(){
        $campanhas = DB::table('campanhas')->where('ativa', 1 )->get();
        return view('admin.atendimentos.select_campanha', compact('campanhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AtendimentoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AtendimentoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $atendimento = $this->repository->create($request->all());

            $response = [
                'message' => 'Atendimento adicionado com sucesso!',
                'data'    => $atendimento->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            $agenda = Agenda::find( $atendimento->agenda_id);
            $agenda->confirm = 'S';
            $agenda->save();

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
        $atendimento = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $atendimento,
            ]);
        }

        return view('atendimentos.show', compact('atendimento'));
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
        $atendimento = $this->repository->find($id);

        return view('atendimentos.edit', compact('atendimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AtendimentoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AtendimentoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $atendimento = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Atendimento atulizado com sucesso!',
                'data'    => $atendimento->toArray(),
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
                'message' => 'Atendimentoexcluido.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Atendimento excluido.');
    }

    public function atenderLote(AtendimentoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            // $pacientes = $request->pacientes;
            // $campanha_id = $request->campanha_id;
            // $dh_agendamento = $request->dh_agendamento;
            // $user_id = $request->user_id;

            // foreach ($pacientes as  $paciente) {

            //     $agenda = new Agenda();
            //     $agenda->user_id = $user_id;
            //     $agenda->paciente_id = $paciente;
            //     $agenda->campanha_id = $campanha_id;
            //     $agenda->dh_agendamento = $dh_agendamento;
            //     $agenda->save();
            // }

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
}
