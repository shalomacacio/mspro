<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UbsCreateRequest;
use App\Http\Requests\UbsUpdateRequest;
use App\Repositories\UbsRepository;
use App\Validators\UbsValidator;

/**
 * Class UbsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UbsController extends Controller
{
    /**
     * @var UbsRepository
     */
    protected $repository;

    /**
     * @var UbsValidator
     */
    protected $validator;

    /**
     * UbsController constructor.
     *
     * @param UbsRepository $repository
     * @param UbsValidator $validator
     */
    public function __construct(UbsRepository $repository, UbsValidator $validator)
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
        $ubs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ubs,
            ]);
        }

        return view('ubs.index', compact('ubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UbsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UbsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ub = $this->repository->create($request->all());

            $response = [
                'message' => 'Ubs created.',
                'data'    => $ub->toArray(),
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
        $ub = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ub,
            ]);
        }

        return view('ubs.show', compact('ub'));
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
        $ub = $this->repository->find($id);

        return view('ubs.edit', compact('ub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UbsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UbsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ub = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ubs updated.',
                'data'    => $ub->toArray(),
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
                'message' => 'Ubs deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ubs deleted.');
    }
}
