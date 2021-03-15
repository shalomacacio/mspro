<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AgendaCreateRequest;
use App\Http\Requests\AgendaUpdateRequest;
use App\Repositories\AgendaRepository;
use App\Validators\AgendaValidator;

/**
 * Class AgendasController.
 *
 * @package namespace App\Http\Controllers;
 */
class AgendasController extends Controller
{
    /**
     * @var AgendaRepository
     */
    protected $repository;

    /**
     * @var AgendaValidator
     */
    protected $validator;

    /**
     * AgendasController constructor.
     *
     * @param AgendaRepository $repository
     * @param AgendaValidator $validator
     */
    public function __construct(AgendaRepository $repository, AgendaValidator $validator)
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
        $agendas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $agendas,
            ]);
        }

        return view('agendas.index', compact('agendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AgendaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AgendaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $agenda = $this->repository->create($request->all());

            $response = [
                'message' => 'Agenda created.',
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agenda = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $agenda,
            ]);
        }

        return view('agendas.show', compact('agenda'));
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
        $agenda = $this->repository->find($id);

        return view('agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AgendaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AgendaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $agenda = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Agenda updated.',
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
                'message' => 'Agenda deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Agenda deleted.');
    }
}
