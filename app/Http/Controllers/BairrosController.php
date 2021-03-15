<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BairroCreateRequest;
use App\Http\Requests\BairroUpdateRequest;
use App\Repositories\BairroRepository;
use App\Validators\BairroValidator;

/**
 * Class BairrosController.
 *
 * @package namespace App\Http\Controllers;
 */
class BairrosController extends Controller
{
    /**
     * @var BairroRepository
     */
    protected $repository;

    /**
     * @var BairroValidator
     */
    protected $validator;

    /**
     * BairrosController constructor.
     *
     * @param BairroRepository $repository
     * @param BairroValidator $validator
     */
    public function __construct(BairroRepository $repository, BairroValidator $validator)
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
        $bairros = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bairros,
            ]);
        }

        return view('bairros.index', compact('bairros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BairroCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BairroCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $bairro = $this->repository->create($request->all());

            $response = [
                'message' => 'Bairro created.',
                'data'    => $bairro->toArray(),
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
        $bairro = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bairro,
            ]);
        }

        return view('bairros.show', compact('bairro'));
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
        $bairro = $this->repository->find($id);

        return view('bairros.edit', compact('bairro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BairroUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BairroUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bairro = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Bairro updated.',
                'data'    => $bairro->toArray(),
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
                'message' => 'Bairro deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Bairro deleted.');
    }
}
