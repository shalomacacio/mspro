<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UfCreateRequest;
use App\Http\Requests\UfUpdateRequest;
use App\Repositories\UfRepository;
use App\Validators\UfValidator;

/**
 * Class UfsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UfsController extends Controller
{
    /**
     * @var UfRepository
     */
    protected $repository;

    /**
     * @var UfValidator
     */
    protected $validator;

    /**
     * UfsController constructor.
     *
     * @param UfRepository $repository
     * @param UfValidator $validator
     */
    public function __construct(UfRepository $repository, UfValidator $validator)
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
        $ufs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ufs,
            ]);
        }

        return view('ufs.index', compact('ufs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UfCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UfCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $uf = $this->repository->create($request->all());

            $response = [
                'message' => 'Uf created.',
                'data'    => $uf->toArray(),
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
        $uf = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $uf,
            ]);
        }

        return view('ufs.show', compact('uf'));
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
        $uf = $this->repository->find($id);

        return view('ufs.edit', compact('uf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UfUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UfUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $uf = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Uf updated.',
                'data'    => $uf->toArray(),
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
                'message' => 'Uf deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Uf deleted.');
    }
}
