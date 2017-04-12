<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;
use CodeProject\Repositories\ProjectNoteRepository;

class ProjectNotesController extends Controller
{

    private $repository;
    private $service;

    /**
     * ProjectNotesController constructor.
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteService $service
     */
    public function __construct(ProjectNoteRepository $repository,
                                ProjectNoteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
        //retorna uma nota pertencente aum determinado prjeto
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id, $noteId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }

    public function update(Request $request, $id, $noteId)
    {
        return $this->service->update($request->all(), $id, $noteId);
    }

    public function destroy($id, $noteId)
    {
        $root = $this->repository->delete($id, $noteId);
        return $root;
    }
}
