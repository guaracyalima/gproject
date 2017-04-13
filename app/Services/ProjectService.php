<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 11/04/2017
 * Time: 13:46
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Prettus\Validator\Exceptions\ValidatorException;

//use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\Storage;


class ProjectService
{
    protected $repository;
    /**
     * @var ClientValidator validators
     */
    private $validator;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(ProjectRepository $repository,
                                ProjectValidator $validator,
                                Filesystem $filesystem,
                                Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(); //testa a vaidacao
            return $this->repository->create($data);
        }
        catch (ValidatorException $exception)
        { //retorna o erro de validacao
            return [
              'error' => true,
                'message' => $exception->getMessage()
            ];
        }

    }

    public function update(array $data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(); //testa a vaidacao
            return $this->repository->update($data, $id);
        }
        catch (ValidationException $exception)
        { //retorna o erro de validacao
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }

    }

    public function createFile(array $data)
    {
        //name, description, extension, file
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data); //salva o arquivo no banco de dados
        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));

    }
}