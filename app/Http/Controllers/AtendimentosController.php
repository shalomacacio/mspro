<?php

namespace App\Http\Controllers;

use App\Entities\Agenda;
use App\Entities\Paciente;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AtendimentoCreateRequest;
use App\Http\Requests\AtendimentoUpdateRequest;
use App\Repositories\AtendimentoRepository;
use App\Validators\AtendimentoValidator;

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

        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create($paciente_id){
        $paciente = Paciente::find($paciente_id );
        return view('admin.atendimentos.create', compact('paciente'));
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
                'message' => 'Atendimento created.',
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
                'message' => 'Atendimento updated.',
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
                'message' => 'Atendimento deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Atendimento deleted.');
    }
}
