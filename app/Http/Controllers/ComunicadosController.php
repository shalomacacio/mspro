<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ComunicadoCreateRequest;
use App\Http\Requests\ComunicadoUpdateRequest;
use App\Repositories\ComunicadoRepository;
use App\Validators\ComunicadoValidator;

/**
 * Class ComunicadosController.
 *
 * @package namespace App\Http\Controllers;
 */
class ComunicadosController extends Controller
{
    /**
     * @var ComunicadoRepository
     */
    protected $repository;

    /**
     * @var ComunicadoValidator
     */
    protected $validator;

    /**
     * ComunicadosController constructor.
     *
     * @param ComunicadoRepository $repository
     * @param ComunicadoValidator $validator
     */
    public function __construct(ComunicadoRepository $repository, ComunicadoValidator $validator)
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
        $comunicados = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comunicados,
            ]);
        }

        return view('comunicados.index', compact('comunicados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ComunicadoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ComunicadoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $comunicado = $this->repository->create($request->all());

            $response = [
                'message' => 'Comunicado created.',
                'data'    => $comunicado->toArray(),
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
        $comunicado = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comunicado,
            ]);
        }

        return view('comunicados.show', compact('comunicado'));
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
        $comunicado = $this->repository->find($id);

        return view('comunicados.edit', compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ComunicadoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ComunicadoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $comunicado = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Comunicado updated.',
                'data'    => $comunicado->toArray(),
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
                'message' => 'Comunicado deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Comunicado deleted.');
    }
}
