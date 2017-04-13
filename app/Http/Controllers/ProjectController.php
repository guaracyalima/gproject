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
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
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
       if( $this->checkProjectPermissions($id) == false)
       {
           return ['error' => 'Access forbidden'];
       }
//        $userId = Authorizer::getResourceOwnerId();
//        if ($this->repository->isOwner($id, $userId) === false)
//        {
//            return ['success' => false];
//        }
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        if( $this->checkProductOwner($id) == false)
        {
            return ['error' => 'Access forbidden'];
        }
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id)
    {
        if( $this->checkProductOwner($id) == false)
        {
            return ['error' => 'Access forbidden'];
        }
        $root = $this->repository->delete($id);
        return $root;
    }

    private  function checkProductOwner($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
      //  $projectId = $request->project;
//        if ($this->repository->isOwner($projectId, $userId) === false)
//        {
//            return ['error' => 'Access forbidden'];
//        }

        return $this->repository->isOwner($projectId, $userId);
    }

    public function checkProjectMember($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId)
    {
        if ($this->checkProductOwner($projectId) or $this->checkProjectMember($projectId))
            {
                return true;
            }
            return false;
    }
}
