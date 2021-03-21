<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CidadeCreateRequest;
use App\Http\Requests\CidadeUpdateRequest;
use App\Repositories\CidadeRepository;
use App\Validators\CidadeValidator;

/**
 * Class CidadesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CidadesController extends Controller
{
    /**
     * @var CidadeRepository
     */
    protected $repository;

    /**
     * @var CidadeValidator
     */
    protected $validator;

    /**
     * CidadesController constructor.
     *
     * @param CidadeRepository $repository
     * @param CidadeValidator $validator
     */
    public function __construct(CidadeRepository $repository, CidadeValidator $validator)
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
        $cidades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cidades,
            ]);
        }

        return view('cidades.index', compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CidadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CidadeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $cidade = $this->repository->create($request->all());

            $response = [
                'message' => 'Cidade adicionado com sucesso!',
                'data'    => $cidade->toArray(),
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
        $cidade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cidade,
            ]);
        }

        return view('cidades.show', compact('cidade'));
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
        $cidade = $this->repository->find($id);

        return view('cidades.edit', compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CidadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CidadeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $cidade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cidade atulizado com sucesso!',
                'data'    => $cidade->toArray(),
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
                'message' => 'Cidadeexcluido.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cidade excluido.');
    }
}
