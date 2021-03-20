<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VacinaCreateRequest;
use App\Http\Requests\VacinaUpdateRequest;
use App\Repositories\VacinaRepository;
use App\Validators\VacinaValidator;

/**
 * Class VacinasController.
 *
 * @package namespace App\Http\Controllers;
 */
class VacinasController extends Controller
{
    /**
     * @var VacinaRepository
     */
    protected $repository;

    /**
     * @var VacinaValidator
     */
    protected $validator;

    /**
     * VacinasController constructor.
     *
     * @param VacinaRepository $repository
     * @param VacinaValidator $validator
     */
    public function __construct(VacinaRepository $repository, VacinaValidator $validator)
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
        $vacinas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vacinas,
            ]);
        }

        return view('vacinas.index', compact('vacinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VacinaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VacinaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $vacina = $this->repository->create($request->all());

            $response = [
                'message' => 'Vacina created.',
                'data'    => $vacina->toArray(),
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
        $vacina = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vacina,
            ]);
        }

        return view('vacinas.show', compact('vacina'));
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
        $vacina = $this->repository->find($id);

        return view('vacinas.edit', compact('vacina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VacinaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VacinaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $vacina = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Vacina updated.',
                'data'    => $vacina->toArray(),
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
                'message' => 'Vacina deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Vacina deleted.');
    }
}
