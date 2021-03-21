<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ComorbidadeCreateRequest;
use App\Http\Requests\ComorbidadeUpdateRequest;
use App\Repositories\ComorbidadeRepository;
use App\Validators\ComorbidadeValidator;

/**
 * Class ComorbidadesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ComorbidadesController extends Controller
{
    /**
     * @var ComorbidadeRepository
     */
    protected $repository;

    /**
     * @var ComorbidadeValidator
     */
    protected $validator;

    /**
     * ComorbidadesController constructor.
     *
     * @param ComorbidadeRepository $repository
     * @param ComorbidadeValidator $validator
     */
    public function __construct(ComorbidadeRepository $repository, ComorbidadeValidator $validator)
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
        $comorbidades = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comorbidades,
            ]);
        }

        return view('comorbidades.index', compact('comorbidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ComorbidadeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ComorbidadeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $comorbidade = $this->repository->create($request->all());

            $response = [
                'message' => 'Comorbidade adicionado com sucesso!',
                'data'    => $comorbidade->toArray(),
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
        $comorbidade = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $comorbidade,
            ]);
        }

        return view('comorbidades.show', compact('comorbidade'));
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
        $comorbidade = $this->repository->find($id);

        return view('comorbidades.edit', compact('comorbidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ComorbidadeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ComorbidadeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $comorbidade = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Comorbidade atulizado com sucesso!',
                'data'    => $comorbidade->toArray(),
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
                'message' => 'Comorbidadeexcluido.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Comorbidade excluido.');
    }
}
