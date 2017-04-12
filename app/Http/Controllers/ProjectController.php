<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller
{
    private $repository;
    private $service;
    public function __construct(ProjectRepository $repository,
                                ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        $userId = Authorizer::getResourceOwnerId();
        if ($this->repository->isOwner($id, $userId) === false)
        {
            return ['success' => false];
        }
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        $root = $this->repository->delete($id);
        return $root;
    }
}
