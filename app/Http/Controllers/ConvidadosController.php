<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ConvidadoCreateRequest;
use App\Http\Requests\ConvidadoUpdateRequest;
use App\Repositories\ConvidadoRepository;
use App\Validators\ConvidadoValidator;

/**
 * Class ConvidadosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConvidadosController extends Controller
{
    /**
     * @var ConvidadoRepository
     */
    protected $repository;

    /**
     * @var ConvidadoValidator
     */
    protected $validator;

    /**
     * ConvidadosController constructor.
     *
     * @param ConvidadoRepository $repository
     * @param ConvidadoValidator $validator
     */
    public function __construct(ConvidadoRepository $repository, ConvidadoValidator $validator)
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
        $convidados = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $convidados,
            ]);
        }

        return view('convidados.index', compact('convidados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConvidadoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConvidadoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $convidado = $this->repository->create($request->all());

            $response = [
                'message' => 'Convidado created.',
                'data'    => $convidado->toArray(),
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
        $convidado = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $convidado,
            ]);
        }

        return view('convidados.show', compact('convidado'));
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
        $convidado = $this->repository->find($id);

        return view('convidados.edit', compact('convidado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConvidadoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConvidadoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $convidado = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Convidado updated.',
                'data'    => $convidado->toArray(),
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
                'message' => 'Convidado deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Convidado deleted.');
    }
}
